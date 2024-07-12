<?php

namespace App\Http\Controllers;

use App\Models\Acessos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcessosController extends Controller
{
    public function login(Request $requisicao)
    {

        $acessos = $requisicao->all();
        $emailLogin = $acessos['email'];
        $senhaLogin = $acessos['senha'];

        $users = Acessos::usuarios();

        if (isset($users)) {
            foreach ($users as $user) {
                if ($user->email == $emailLogin && $user->senha == $senhaLogin) {
                        return redirect()->route('dashboard', ['user' => $user]);
                }
            }
            return redirect()->route('login')->with('msgErro', 'Email ou senha incorretos, tente novamente.');
        } else {
            echo "ERRO NO ENVIO DO FORMULARIO TENTE NOVAMENTE";
            die;
        }
    }

    public function showLoginForm()
    {
        return view('acesso.login');
    }

    public function dashboard(Request $requisicao)
    {
        $user = $requisicao->all();
        $chart = new DashbordController();

        $graficoPizza = $chart->index();
        $graficoBarra = $chart->index2();
        // echo "<br><br>";
        // print_r($graficoPizza);
        // die;
        return view('acesso.dashboard', ['user' => $user, 'graficoPizza' => $graficoPizza, 'graficoBarra' => $graficoBarra]);
    }
}
