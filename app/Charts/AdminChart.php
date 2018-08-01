<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class AdminChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->labels(['janeiro','Fevereiro','Março','Abril','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro']);
    }
}
