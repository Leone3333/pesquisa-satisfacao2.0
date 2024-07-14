<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedbacks;
use App\Charts\FeedbacksChart;

class DashbordController extends Controller
{
    //
    public function index()
    {
        $chart = new FeedbacksChart;
        return $chart->quantidadeFeedbacksChart();
    }

    public function index2()
    {
        $chart = new FeedbacksChart;
        return $chart->feedbacksPorSetor();
    }


    public function index3()
    {
        $query = Feedbacks::all()->toArray();

        return $query;
    }

    public function index4($requestTipoFeedback)
    {
        // foreach (Feedbacks::all() as $feedback) {
        //     echo $feedback->tipoFeedback;
        //     echo $feedback->setor;
        //     echo $feedback->comentario;
        //     echo "<br>";
        // }

        $query = Feedbacks::where('tipoFeedback', $requestTipoFeedback)
        ->orderBy('setor')
        ->get()
        ->toArray();

        return $query;
    }
}
