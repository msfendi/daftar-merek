<?php

namespace App\Livewire\Permohonan;

use App\Models\Permohonan;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;
    public $nama_usaha;
    public $alamat_usaha;
    public $pemilik_usaha;
    public $logo;
    public $umk;
    public $ttd;
    public $data_merek = [];

    public function render()
    {
        return view('livewire.permohonan.create');
    }

    public function updated()
    {
        $this->checkSimilarity();
    }

    public function checkSimilarity()
    {
        $comparison = new \Atomescrochus\StringSimilarities\Compare();
        $data[] =  cekKetersediaanMerek($this->nama_usaha);

        foreach ($data as $d => $value) {
            if (is_iterable($value)) {
                foreach ($value as $v => $val) {
                    $trademark[] = [
                        'nama' => Str::lower($val['nama_merek']),
                        'similarity' => $comparison->smg($this->nama_usaha, Str::lower($val['nama_merek'])) * 100,
                    ];
                }
            }
        }
        $this->data_merek = $trademark;
    }

    public function store()
    {
        $data = Permohonan::where('nama_usaha', $this->nama_usaha)->first();
        if ($data != null) {
            session()->flash('error', 'Nama usaha sudah terdaftar.');

            return redirect()->route('admin.permohonan.create');
        } else {
            $this->validate([
                'nama_usaha' => 'required',
                'alamat_usaha' => 'required',
                'pemilik_usaha' => 'required',
                'logo' => 'required|image|max:2048',
                'umk' => 'required',
                'ttd' => 'required|image|max:2048',
            ]);

            $logoName = microtime() . '.' . $this->logo->extension();
            $this->logo->storeAs('logo', $logoName, 'public');

            $ttdName = microtime() . '.' . $this->ttd->extension();
            $this->ttd->storeAs('ttd', $ttdName, 'public');

            Permohonan::create([
                'nama_usaha' => $this->nama_usaha,
                'alamat_usaha' => $this->alamat_usaha,
                'pemilik_usaha' => $this->pemilik_usaha,
                'logo' => $logoName,
                'umk' => $this->umk,
                'ttd' => $ttdName,
                'status' => 'diajukan',
                'user_id' => auth()->user()->id,
            ]);

            session()->flash('success', 'Permohonan berhasil dibuat.');

            return redirect()->route('permohonan.index');
        }
    }
}
