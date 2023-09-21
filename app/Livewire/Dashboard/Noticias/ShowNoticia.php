<?php

namespace App\Livewire\Dashboard\Noticias;

use App\Models\Fotos;
use App\Models\Noticias;
use App\Models\Pagina;
use Livewire\Component;

class ShowNoticia extends Component
{

    public $noticia;
    public $pagina;
    public $fotos = [];

    public function mount($slug)
    {
        $this->noticia = Noticias::GetNoticiaBySlug($slug);
        $this->pagina = Pagina::GetPagina(1);
        $this->fotos = Fotos::GetFotosByNoticia($this->noticia->id);
    }

    public function render()
    {
        return view('livewire.dashboard.noticias.show-noticia')
            ->layout('layouts.app', ['type' => 'back', 'pagina' => $this->pagina]);
    }
}
