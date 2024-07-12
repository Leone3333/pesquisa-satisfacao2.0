<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

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
        // Campos
        $this->labels(['Muito satisfeito', 'Mais ou menos', 'Insatisfeito']);

        // Nome do grafico, tipo do grafico, valores->método das cores([cores aqui])
        $this->dataset('Feedbacks', 'pie', [26,13,22])->backgroundColor(['#28a745', '#ffc107', '#dc3545']);
        return $this;
    }
}
