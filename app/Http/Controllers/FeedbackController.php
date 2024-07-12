<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedbacks;
use App\Charts\FeedbacksChart;

class FeedbackController extends Controller
{
    //
    public function exibirDados()
    {
        $feedbacks = Feedbacks::all();

        return view('teste', ['feedbacks' => $feedbacks]);
    }

    public function redirecionarParaCriacao(Request $requisicao)
    {
        $feedbackStatus = $requisicao->all();
        return view('comentarios.criarComentario', ['feedbackStatus' => $feedbackStatus]);
    }

    public function salvarFeedback(Request $requisicao)
    {
        $feedback = new Feedbacks;

        $feedback->tipoFeedback = $requisicao->feedbackStatus;
        $feedback->setor = $requisicao->setores;
        $feedback->comentario = $requisicao->comentarioFeedback;

        $feedback->save();

        return redirect('/');
    }
}
