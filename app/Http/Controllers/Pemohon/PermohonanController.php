<?php

namespace App\Http\Controllers\Pemohon;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    public function index()
    {
        return view('pemohon.permohonan.index');
    }

    public function edit($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        return view('pemohon.permohonan.edit', [
            'permohonans' => $permohonan
        ]);
    }
}
