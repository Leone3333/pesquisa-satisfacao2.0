<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedbacks;
use App\Charts\FeedbacksChart;

class DashbordController extends Controller
{
    //
    public function chartQttFeedback()
    {
        $chart = new FeedbacksChart;
        return $chart->quantidadeFeedbacksChart();
    }

    public function chartFeedbackPorSetor()
    {
        $chart = new FeedbacksChart;
        return $chart->feedbacksPorSetor();
    }


    public function allFeedbacks()
    {
        $query = Feedbacks::all()->toArray();

        return $query;
    }

    public function onlyFeedbacksForType($requestTipoFeedback)
    {
        $query = Feedbacks::where('tipoFeedback', $requestTipoFeedback)
            ->orderBy('setor')
            ->get()
            ->toArray();

        return $query;
    }

    public function onlyFeedbacksForSetor($requestSetorFeedback)
    {
        if ($requestSetorFeedback != "outros") {
            $query = Feedbacks::where('setor', $requestSetorFeedback)
                ->orderBy('tipoFeedback')
                ->get()
                ->toArray();

            return $query;

        } else {
            $query = Feedbacks::whereNotIn('setor', ['atendimento','caixa','limpeza','organização','vendedores'])
                ->orderBy('tipoFeedback')
                ->get()
                ->toArray();

            return $query;
        }
    }
}
