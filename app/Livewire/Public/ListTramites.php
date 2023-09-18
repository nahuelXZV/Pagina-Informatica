<?php

namespace App\Livewire\Public;

use App\Models\Tramites;
use Livewire\Component;
use Livewire\WithPagination;

class ListTramites extends Component
{
    use WithPagination;

    public function render()
    {
        $tramites = Tramites::GetTramitesPaginate("", "desc", 10);
        return view('livewire.public.list-tramites', compact('tramites'));
    }
}
