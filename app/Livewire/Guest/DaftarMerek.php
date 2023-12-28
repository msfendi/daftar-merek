<?php

namespace App\Livewire\Guest;

use Livewire\Attributes\On;
use Livewire\Component;

class DaftarMerek extends Component
{
    public $trademark;
    #[On('data-merek')]
    public function updateMerek($keyword)
    {
        $this->trademark = $keyword;
        // dd($this->trademark);
    }


    public function render()
    {
        return view('livewire.guest.daftar-merek');
    }
}
