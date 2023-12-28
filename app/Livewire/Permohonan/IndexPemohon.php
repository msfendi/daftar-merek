<?php

namespace App\Livewire\Permohonan;

use App\Models\Permohonan;
use Livewire\Component;

use function Laravel\Prompts\alert;

class IndexPemohon extends Component
{
    public $nama_usaha;
    public $alamat_usaha;
    public $pemilik_usaha;
    public $umk;
    public $logo_usaha;
    public $ttd;
    public $status_usaha;
    public $keterangan;
    public $showTrademark = false;
    public function render()
    {
        $permohonans = Permohonan::where('user_id', auth()->user()->id)->get();
        return view('livewire.permohonan.index-pemohon', compact('permohonans'));
    }

    public function showDetail($id)
    {
        if ($id == null) {
            return alert('Id tidak ditangkap');
        } else {
            $permohonan = Permohonan::findOrFail($id);
            $this->nama_usaha = $permohonan->nama_usaha;
            $this->alamat_usaha = $permohonan->alamat_usaha;
            $this->pemilik_usaha = $permohonan->pemilik_usaha;
            $this->umk = $permohonan->umk;
            $this->logo_usaha = $permohonan->logo;
            $this->status_usaha = $permohonan->status;
            $this->keterangan = $permohonan->keterangan;
            if ($this->status_usaha != null) {
                $this->showTrademark = true;
            }
        }
    }

    public function closeDetail()
    {
        $this->showTrademark = false;
    }

    public function defaultImage($image)
    {
        if (file_exists(public_path('storage/logo/' . $image))) {
            return asset('storage/logo/' . $image);
        } else {
            // return asset('assets/default/images/room-type.jpg');
        }
    }

    public function destroy($id)
    {
        if ($id == null) {
            return alert('Id tidak ditangkap');
        } else {
            $permohonan = Permohonan::findOrFail($id);
            $permohonan->delete();
            return alert('Berhasil menghapus data');
        }
    }
}
