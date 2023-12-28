<?php

namespace App\Livewire\Admin;

use App\Charts\PermohonanBulananChart;
use App\Charts\UserActiveBulananChart;
use Carbon\Carbon;
use Livewire\Component;

class Index extends Component
{
    public $totalUser;
    public $totalLoginHarian;
    public $totalLoginBulan;
    public $totalLoginTahun;
    public $totalMerek;
    public $totalPermohonanHarian;
    public $totalPermohonanBulan;
    public $totalPermohonanTahun;
    public function render(PermohonanBulananChart $permohonanBulananChart, UserActiveBulananChart $userActiveBulananChart)
    {
        $this->totalUser = \App\Models\User::count();
        $this->totalLoginHarian = \App\Models\LogAccount::whereDate('created_at', date('Y-m-d'))->count();
        $this->totalLoginBulan = \App\Models\LogAccount::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();
        $this->totalLoginTahun = \App\Models\LogAccount::whereYear('created_at', Carbon::now()->year)->count();
        // hitung total merek yang memiliki status permohonan diterima
        $this->totalPermohonanHarian = \App\Models\Permohonan::whereDate('created_at', date('Y-m-d'))->count();
        $this->totalPermohonanBulan = \App\Models\Permohonan::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();
        $this->totalPermohonanTahun = \App\Models\Permohonan::whereYear('created_at', Carbon::now()->year)->count();
        $this->totalMerek = \App\Models\Permohonan::where('status', 'diterima')->count();
        return view('livewire.admin.index', [
            'permohonanBulananChart' => $permohonanBulananChart->build(),
            'userActiveBulananChart' => $userActiveBulananChart->build(),
        ]);
    }
}
