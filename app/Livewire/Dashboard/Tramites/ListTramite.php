<?php

namespace App\Livewire\Dashboard\Tramites;

use App\Models\Tramites;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class ListTramite extends Component
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
        if (Tramites::DeleteTramite($id)) {
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
        $tramites = Tramites::GetTramitesPaginate($this->search, 'ASC', 20);
        return view('livewire.dashboard.tramites.list-tramite', compact('tramites'))->layout('layouts.dashboard');
    }
}
