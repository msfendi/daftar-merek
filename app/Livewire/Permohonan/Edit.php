<?php

namespace App\Livewire\Permohonan;

use App\Models\Permohonan;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Edit extends Component
{
    use WithFileUploads;
    public $id;
    public $nama_usaha;
    public $alamat_usaha;
    public $pemilik_usaha;
    public $logo;
    public $oldLogo;
    public $umk;
    public $ttd;
    public $oldTtd;
    public $data_merek = [];

    public function render()
    {
        return view('livewire.permohonan.edit');
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

    public function mount($permohonan)
    {
        $this->id = $permohonan->id;
        $this->nama_usaha = $permohonan->nama_usaha;
        $this->alamat_usaha = $permohonan->alamat_usaha;
        $this->pemilik_usaha = $permohonan->pemilik_usaha;
        $this->oldLogo = $permohonan->logo ? $permohonan->logo : null;
        $this->umk = $permohonan->umk;
        $this->oldTtd = $permohonan->ttd ? $permohonan->ttd : null;
    }

    public function update()
    {
        // $data = Permohonan::where('nama_usaha', $this->nama_usaha)->first();
        // if ($data < 2) {
        //     session()->flash('error', 'Nama usaha sudah terdaftar.');

        //     return redirect()->route('permohonan.edit', $this->id);
        // } else {
        $this->validate([
            'nama_usaha' => 'required',
            'alamat_usaha' => 'required',
            'pemilik_usaha' => 'required',
            // 'logo' => 'required|image|max:2048',
            'umk' => 'required',
            // 'ttd' => 'required|image|max:2048',
        ]);

        $data = [
            'nama_usaha' => $this->nama_usaha,
            'alamat_usaha' => $this->alamat_usaha,
            'pemilik_usaha' => $this->pemilik_usaha,
            'umk' => $this->umk,
        ];


        if ($this->logo) {
            $logoName = microtime() . '.' . $this->logo->extension();
            $this->logo->storeAs('logo', $logoName, 'public');
            $data['logo'] = $logoName;
        } else {
            $data['logo'] = $this->oldLogo;
        }

        if ($this->ttd) {
            $ttdName = microtime() . '.' . $this->ttd->extension();
            $this->ttd->storeAs('ttd', $ttdName, 'public');
            $data['ttd'] = $ttdName;
        } else {
            $data['ttd'] = $this->oldTtd;
        }

        Permohonan::where('id', $this->id)->update($data);

        session()->flash('success', 'Permohonan berhasil diupdate.');

        return redirect()->route('permohonan.index');
    }
    // }
}
