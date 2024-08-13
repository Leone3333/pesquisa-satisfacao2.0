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
            $cardColorfull = $chart->cardsColorfull();
            $cardGray = $chart->cardGray();

            $graficoPizza = $chart->chartQttFeedback();
            $graficoBarra = $chart->chartFeedbackPorSetor();

            if (isset($requisicao['tipoFeedback']) || session('tipoFeedback')) {
                $tabletipoFeedback = $chart->onlyFeedbacksForType($requisicao['tipoFeedback']);

                $this->sessionsDashboardTipoFeedback($requisicao['tipoFeedback']);

                return view('acesso.dashboard', [
                    'graficoPizza' => $graficoPizza,
                    'graficoBarra' => $graficoBarra,
                    'table' => $tabletipoFeedback,
                    'cardColorfull' => $cardColorfull,
                    'cardGray' => $cardGray
                ]);
            } else if (isset($requisicao['setorFeedback']) || session('setorFeedback')) {
                $tablesetorFeedback = $chart->onlyFeedbacksForSetor($requisicao['setorFeedback']);

                $this->sessionsDashboardSetorFeedback($requisicao['setorFeedback']);

                return view('acesso.dashboard', [
                    'graficoPizza' => $graficoPizza,
                    'graficoBarra' => $graficoBarra,
                    'table' => $tablesetorFeedback,
                    'cardColorfull' => $cardColorfull,
                    'cardGray' => $cardGray
                ]);
            } else {

                $table = $chart->allFeedbacks();

                return view('acesso.dashboard', [
                    'graficoPizza' => $graficoPizza,
                    'graficoBarra' => $graficoBarra,
                    'table' => $table,
                    'cardColorfull' => $cardColorfull,
                    'cardGray' => $cardGray
                ]);
            }

        }
    }


    public function sessionsDashboardTipoFeedback($tipoFeedback)
    {
        session()->forget('setorFeedback');
        session()->put('tipoFeedback', $tipoFeedback);
    }

    public function sessionsDashboardSetorFeedback($setorFeedback)
    {
        session()->forget('tipoFeedback');
        session()->put('setorFeedback', $setorFeedback);
    }

    public function reload(Request $requisicao)
    {
        session()->forget('tipoFeedback');
        session()->forget('setorFeedback');

        $chart = new DashbordController();
        $cardColorfull = $chart->cardsColorfull();
        $cardGray = $chart->cardGray();

        $graficoPizza = $chart->chartQttFeedback();
        $graficoBarra = $chart->chartFeedbackPorSetor();

        $table = $chart->allFeedbacks();

                return view('acesso.dashboard', [
                    'graficoPizza' => $graficoPizza,
                    'graficoBarra' => $graficoBarra,
                    'table' => $table,
                    'cardColorfull' => $cardColorfull,
                    'cardGray' => $cardGray
                ]);
    }
}
