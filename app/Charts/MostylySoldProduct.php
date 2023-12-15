<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class MostylySoldProduct
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $result = DB::select('SELECT pname ,SUM(sellingprice) AS sp,SUM(costprice)AS cp FROM `products` INNER JOIN `sales` ON sales.pid=products.id GROUP BY sales.pid');
        $productName = [];
        $profit = [];
        $count = 0;
        foreach ($result as $sale) {
            $profit[$count] = $sale->sp - $sale->cp;
            $productName[$count] = $sale->pname;
            $count++;
        }

        return $this->chart
            ->pieChart()
            ->addData($profit)
            ->setLabels($productName);
    }
}
