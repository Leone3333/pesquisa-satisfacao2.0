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
}
