<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class ProductDepletionChart
{
    protected $chart;
    protected $pId = 0;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function getProductId($id)
    {
        $this->pId = $id;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $result = DB::select("SELECT SUM(quantity) as qtysold,sales.salesdate  FROM sales where sales.pid=$this->pId GROUP BY sales.salesdate DESC limit 7");
        $available = DB::select("SELECT SUM(stocks.quantity) as remaining FROM stocks where stocks.pid=$this->pId");
        $availableStock = $available[0]->remaining;
        $count = 0;
        $sold = 0;
        $day = [];
        $remainingStock = [];
        for ($i = 0; $i < count($result); $i++) {
            $sold += $result[$i]->qtysold;
            $count++;
        }
        $ratio = 0;
        if ($sold != 0 && $count != 0) {
            $ratio = $sold / $count;
            // echo 'sold = ' . $sold . '<br>';
            // echo 'days = ' . $count . '<br>';
            // echo 'ratio = ' . round($ratio) . '<br>';
            // echo 'available = ' . $availableStock . '<br>';
            // echo 'remaining days = ' . ceil($availableStock / $ratio) . ' (' . $availableStock / $ratio . ')<br>';

            $day = [];
            $remainingStock = [];
            $tempRemaining = $availableStock;
            $day[0] = 'Today';
            $remainingStock[0] = $availableStock;
            for ($i = 1; $i <= ceil($availableStock / $ratio); $i++) {
                $day[$i] = 'Day ' . $i;
                $reducer = $remainingStock[$i - 1] - ceil($ratio);
                $remainingStock[$i] = $reducer <= 0 ? 0 : $reducer;
            }
            if (count($day) - 1 <= 5) {
                return $this->chart
                    ->areaChart()
                    ->setTitle('Expected to last ' .( count($day) - 1 ). ' days only.')
                    ->addData('Remaining Product', $remainingStock)
                    ->setColors(['#ff6384'])
                    ->setXAxis($day)
                    ->setGrid();
            } elseif (count($day) - 1 <= 10) {
                return $this->chart
                    ->areaChart()
                    ->setTitle('Expected to last ' .( count($day) - 1 ) . ' days')
                    ->addData('Remaining Product', $remainingStock)
                    ->setColors(['#ffc63b'])
                    ->setXAxis($day)
                    ->setGrid();
            } else {
                return $this->chart
                    ->areaChart()
                    ->setTitle('Expected to last ' .( count($day) - 1 ) . ' days')
                    ->addData('Remaining Product', $remainingStock)
                    ->setXAxis($day)
                    ->setGrid();
            }
        } else {
            return $this->chart
                ->areaChart()
                ->setTitle('No Sufficient data for prediction')
                ->addData('Depletion per day', [0, 0, 0, 0])
                ->setXAxis(['Today', 'Day 1', 'Day 2', 'Day 3'])
                ->setFontFamily('SansSerif');
        }
    }
}
