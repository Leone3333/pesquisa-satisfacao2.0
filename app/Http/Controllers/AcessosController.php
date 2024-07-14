<?php

namespace App\Http\Controllers;

use App\Models\Acessos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcessosController extends Controller
{
    public function login(Request $requisicao)
    {

        if (!isset($requisicao)) {
            return redirect()->route('login');
        } else {
            $acessos = $requisicao->all();
            $emailLogin = $acessos['email'];
            $senhaLogin = $acessos['senha'];

            $users = Acessos::usuarios();

            if (isset($users)) {
                foreach ($users as $user) {
                    if ($user->email == $emailLogin && $user->senha == $senhaLogin) {
                        session()->put('user', $user);
                        return redirect()->route('dashboard');
                    }
                }
                return redirect()->route('login')->with('msgErro', 'Email ou senha incorretos, tente novamente.');
            } else {
                echo "ERRO NO ENVIO DO FORMULARIO TENTE NOVAMENTE";
                die;
            }
        }
    }

    public function showLoginForm()
    {
        return view('acesso.login');
    }

    public function dashboard(Request $requisicao)
    {
        $user = session()->get('user');

        if (!isset($user)) {
            return redirect()->route('login')->with('msgErro', 'Acesso negado pelo provedor.');
        } else {
            $chart = new DashbordController();

            $graficoPizza = $chart->index();
            $graficoBarra = $chart->index2();

            if (isset($requisicao['feedback'])) {
                $table = $chart->index4($requisicao['feedback']);
                return view('acesso.dashboard', ['graficoPizza' => $graficoPizza, 'graficoBarra' => $graficoBarra, 'table' => $table]);
            } else {
                $table = $chart->index3();
                return view('acesso.dashboard', ['graficoPizza' => $graficoPizza, 'graficoBarra' => $graficoBarra, 'table' => $table]);
            }
        }
    }
}
