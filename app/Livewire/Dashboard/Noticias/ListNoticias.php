<?php

namespace App\Livewire\Dashboard\Noticias;

use App\Models\Noticias;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class ListNoticias extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search = '';
    public $notificacion = false;
    public $type = 'success';
    public $message = 'Creado correctamente';

    public function toggleNotificacion()
    {
        $this->notificacion = !$this->notificacion;
        $this->emit('notificacion');
    }

    //Metodo de reinicio de buscador
    public function updatingAttribute()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        if (Noticias::DeleteNoticia($id)) {
            $this->message = 'Eliminado correctamente';
            $this->type = 'success';
        } else {
            $this->message = 'Error al eliminar';
            $this->type = 'error';
        }
        $this->notificacion = true;
    }

    public function render()
    {
        $noticias = Noticias::GetNoticiasPaginate($this->search, 'ASC', 20);
        return view('livewire.dashboard.noticias.list-noticias', compact('noticias'))->layout('layouts.dashboard');
    }
}
