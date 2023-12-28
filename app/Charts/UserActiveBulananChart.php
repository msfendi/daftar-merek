<?php

namespace App\Charts;

use App\Models\LogAccount;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class UserActiveBulananChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $Logger = LogAccount::select('id', 'created_at')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $loggermcount = [];
        $arr = [];
        foreach ($Logger as $key => $value) {
            $loggermcount[(int)$key] = count($value);
        }
        for ($i = 1; $i <= 12; $i++) {
            if (!empty($loggermcount[$i])) {
                $arr[] = $loggermcount[$i];
            } else {
                $arr[] = 0;
            }
        }

        $loggermcount = array_values($arr);

        return $this->chart->barChart()
            ->setTitle('Rekap Jumlah Akses Member ')
            ->setSubtitle('Selama Periode Tahun 2023')
            ->setWidth(900)
            ->setHeight(400)
            ->addData('s', $loggermcount)
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Agst', 'Sep', 'Oct', 'Nov', 'Dec']);
    }
}
