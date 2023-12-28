<?php

namespace App\Livewire\Permohonan;

use App\Exports\PermohonansExport;
use App\Models\Permohonan;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

use function Laravel\Prompts\alert;

class Index extends Component
{
    public $permohonanId;
    public $status;
    public $showModal = false;
    public $keterangan;
    public $statusList = ['diajukan', 'diterima', 'perbaikan', 'ditolak'];
    public Collection $selectedPermohonan;


    // public function showPermohonan($id)
    // {
    //     $permohonan = Permohonan::findOrFail($id);
    //     dd($permohonan);
    // }

    // public function mount() 
    // {
    //     $this->selectedPermohonan = collect();
    // }

    public function checkId($id)
    {
        if ($id == null) {
            return alert('Id tidak ditangkap');
        } else {
            $permohonan = Permohonan::findOrFail($id);
            $this->permohonanId = $permohonan->id;
            $this->status = $permohonan->status;
            $this->keterangan = $permohonan->keterangan;
            if ($this->status != null) {
                $this->showModal = true;
            }
        }
    }

    public function getSelectedPermohonan()
    {
        return $this->selectedPermohonan->filter(fn ($p) => $p)->keys();
    }

    public function export()
    {
        return Excel::download(new PermohonansExport(), 'rekap-permohonan-merek.xlsx');
    }


    public function verificationPermohonan()
    {
        $permohonan = Permohonan::findOrFail($this->permohonanId);
        $permohonan->update([
            'status' => $this->status,
            'keterangan' => $this->keterangan,
        ]);

        session()->flash('success', 'Permohonan berhasil diverifikasi.');

        return redirect()->route('admin.permohonan.index');
    }

    public function defaultImage($image)
    {
        if (file_exists(public_path('storage/logo/' . $image))) {
            return asset('storage/logo/' . $image);
        } else {
            // return asset('assets/default/images/room-type.jpg');
        }
    }

    public function render()
    {
        $permohonans = Permohonan::all();
        $statusList = $this->statusList;
        return view('livewire.permohonan.index', compact(['permohonans', 'statusList']));
    }

    public function destroy($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        $permohonan->delete();

        session()->flash('success', 'Permohonan berhasil dihapus.');

        return redirect()->route('admin.permohonan.index');
    }
}
