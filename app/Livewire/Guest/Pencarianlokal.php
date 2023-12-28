<?php

namespace App\Livewire\Guest;

use App\Models\Permohonan;
use Livewire\Component;

class Pencarianlokal extends Component
{
    public $keyword;
    public function render()
    {
        return view('livewire.guest.pencarianlokal');
    }

    public function cariMerek()
    {
        // buat function cari merek berdasarkan nama dari db
        $data = Permohonan::where('nama_usaha', 'like', '%' . $this->keyword . '%')->get();
        dd($data);
        // $this->dispatch('data-merek', $this->keyword);
        $this->dispatch('merek-local', $data);
    }
}
