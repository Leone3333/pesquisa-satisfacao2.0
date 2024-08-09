<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedbacks;
use App\Charts\FeedbacksChart;
use Illuminate\Support\Facades\DB;

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
        $query = Feedbacks::paginate(10);

        return $query;
    }

    public function onlyFeedbacksForType($requestTipoFeedback)
    {
        $query = Feedbacks::where('tipoFeedback', $requestTipoFeedback)
            ->orderBy('setor')
            ->paginate(10);

        return $query;
    }

    public function onlyFeedbacksForSetor($requestSetorFeedback)
    {
        if ($requestSetorFeedback != "outros") {
            $query = Feedbacks::where('setor', $requestSetorFeedback)
                ->orderBy('tipoFeedback')
                ->paginate(10);

            return $query;
        } else {
            $query = Feedbacks::whereNotIn('setor', ['atendimento', 'caixa', 'limpeza', 'organização'])
                ->orderBy('tipoFeedback')
                ->paginate(10);

            return $query;
        }
    }

    public function cardsColorfull()
    {

        $query = Feedbacks::selectRaw("tipoFeedback, ROUND(COUNT(tipoFeedback) * 100.0 / (SELECT COUNT(*) FROM feedbacks), 2) AS perTipoFeedback")
            ->groupBy('tipoFeedback')
            ->orderBy('tipoFeedback')
            ->get()
            ->toArray();

        return $query;
    }

    public function cardGray()
    {
        $query = Feedbacks::selectRaw("COUNT(*) as total")
            ->get()
            ->toArray();

        return $query;
    }
}
