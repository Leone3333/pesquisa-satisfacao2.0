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
                if ($user->email == $emailLogin) {
                    if ($user->senha == $senhaLogin) {
                        return view('acesso.dashbord', ['acesso' => $user]);
                    }
                }
            }
            return view('acesso.login', ['msg' => $msg]);
        } else {
            echo "ERRO NO ENVIO DO FORMULARIO TENTE NOVAMENTE";
            die;
        }
    }
}
