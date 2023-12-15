<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $result = DB::select('SELECT SUM(sellingprice) AS sp,SUM(costprice) AS cp,salesdate FROM `sales` GROUP BY salesdate ORDER BY salesdate desc limit 7');
        $spArray = [];
        $cpArray = [];
        $salesDate = [];
        $profitlossArray = [];
        $count = 0;
        foreach ($result as $salesPerDay) {
            $spArray[$count] = $salesPerDay->sp;
            $cpArray[$count] = $salesPerDay->cp;
            $profitlossArray[$count] = $spArray[$count] - $cpArray[$count];
            $salesDate[$count] = substr($salesPerDay->salesdate, 4, 2) . '/' . substr($salesPerDay->salesdate, 6, 2);
            $count++;
        }

        return $this->chart
            ->areaChart()
            ->addData('Sales Price', array_reverse($spArray))
            ->addData('Cost Price', array_reverse($cpArray))
            ->addData('Total Profit', array_reverse($profitlossArray))
            ->setColors(['#4a5fec', '#31b536', '#b631ce'])
            ->setGrid()
            ->setXAxis(array_reverse($salesDate));
    }
}
