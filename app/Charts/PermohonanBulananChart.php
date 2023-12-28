<?php

namespace App\Charts;

use App\Models\Permohonan;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Json;

class PermohonanBulananChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $permohonan = Permohonan::select('id', 'created_at')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $permohonanmcount = [];
        $arr = [];
        foreach ($permohonan as $key => $value) {
            $permohonanmcount[(int)$key] = count($value);
        }
        for ($i = 1; $i <= 12; $i++) {
            if (!empty($permohonanmcount[$i])) {
                $arr[] = $permohonanmcount[$i];
            } else {
                $arr[] = 0;
            }
        }

        $permohonanmcount = array_values($arr);

        return $this->chart->barChart()
            ->setTitle('Rekap Pengajuan Permohonan Merek')
            ->setSubtitle('Selama Periode Tahun 2023')
            ->setWidth(900)
            ->setHeight(400)
            ->addData('s', $permohonanmcount)
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Agst', 'Sep', 'Oct', 'Nov', 'Dec']);
    }
}
