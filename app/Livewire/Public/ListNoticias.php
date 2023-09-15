<?php

namespace App\Livewire\Public;

use App\Models\Noticias;
use Livewire\Component;
use Livewire\WithPagination;

class ListNoticias extends Component
{
    use WithPagination;

    public function render()
    {
        $noticias = Noticias::GetNoticiasPaginate("", "desc", 10);
        return view('livewire.public.list-noticias', compact('noticias'));
    }
}
