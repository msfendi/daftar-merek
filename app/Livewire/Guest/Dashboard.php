<?php

namespace App\Livewire\Guest;

use Livewire\Component;
use Livewire\Attributes\On;

class Dashboard extends Component
{
    public $keyword;

    public function render()
    {
        return view('livewire.guest.dashboard');
    }

    public function cariMerek()
    {
        // dd($this->keyword);
        // $this->validate([
        //     'keyword' => 'required'
        // ]);

        $data = pencarianMerek($this->keyword);
        // $this->dispatch('data-merek', $this->keyword);
        $this->dispatch('data-merek', $data);
    }
}
