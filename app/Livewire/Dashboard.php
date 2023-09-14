<?php

namespace App\Livewire;

use Livewire\Component;

// #[Layout('layouts.dashboard')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard')
            ->layout('layouts.dashboard');
    }
}
