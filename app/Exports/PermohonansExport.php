<?php

namespace App\Exports;

use App\Models\Permohonan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PermohonansExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Permohonan::all();
    }

    public function view(): View
    {
        return view('exports.permohonans', [
            'permohonans' => Permohonan::all()
        ]);
    }
}
