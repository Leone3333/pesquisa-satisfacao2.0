<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use App\Models\Feedbacks;

class FeedbacksChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function quantidadeFeedbacksChart()
    {
        $data = Feedbacks::selectRaw('tipoFeedback, COUNT(*) as total')
        ->groupBy('tipoFeedback')
        ->orderBy('tipoFeedback')
        ->get()
        ->toArray();

        // Campos
        $this->labels(['Satisfeito', 'Insatisfeito', 'Muito insatisfeito']);

        // Nome do grafico, tipo do grafico, valores->método das cores([cores aqui])
        $this->dataset('Total', 'pie', [$data[0]['total'],$data[1]['total'],$data[2]['total']])
        ->backgroundColor(['#28a745', '#ffc107', '#dc3545']);
        return $this;
    }

    public function feedbacksPorSetor()
    {
        $data = Feedbacks::selectRaw('setor, COUNT(*) as total')
        ->whereIn('setor', ['atendimento','caixa','limpeza','organização'])
        ->groupBy('setor')
        ->orderBy('setor')
        ->get()
        ->toArray();

        $this->labels(['atendimento', 'caixa', 'limpeza', 'organização']);

        $this->dataset('Total de Feedbacks', 'bar', [$data[0]['total'],$data[1]['total'],$data[2]['total'], $data[3]['total']])
        ->backgroundColor(['#28a745', '#ffc107', '#dc3545','#ed8021']);

        $this->options([
            'legend' => [
                'display' => false, // Desabilita a legenda interativa
            ],


        ]);
        return $this;
    }
}
