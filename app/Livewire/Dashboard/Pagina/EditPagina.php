<?php

namespace App\Livewire\Dashboard\Pagina;

use App\Models\Pagina;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditPagina extends Component
{
    use WithFileUploads;
    public $paginaArray = [];
    public $notificacion = false;
    public $type = 'success';
    public $message = 'Creado correctamente';

    public $pagina;
    public $validateArray = ['imagen', 'calendario', 'plan_estudio_file'];
    public $nombre_array = ['imagen_principal', 'calendario_academico', 'plan_estudio'];

    public function mount()
    {
        $this->pagina = Pagina::find(1);
        $this->paginaArray = [
            'telefono' => $this->pagina->telefono,
            'correo' => $this->pagina->correo,
            'direccion' => $this->pagina->direccion,
            'url_facebook' => $this->pagina->url_facebook,
            'url_whatsapp' => $this->pagina->url_whatsapp,
            'imagen_principal' => $this->pagina->imagen_principal,
            'calendario_academico' => $this->pagina->calendario_academico,
            'plan_estudio' => $this->pagina->plan_estudio,
            'imagen' => '',
            'calendario' => '',
            'plan_estudio_file' => ''
        ];
    }

    public function save()
    {
        $validate = Pagina::$validate;
        foreach ($this->validateArray as $key => $value) {
            if (!$this->paginaArray[$value])
                unset($validate["paginaArray." . $value]);
            else
                $this->saveFile($this->paginaArray[$value], $this->nombre_array[$key]);
        }
        $this->validate($validate, Pagina::$messages);
        $new = Pagina::UpdatePagina($this->pagina->id, $this->paginaArray);
        if (!$new) {
            $this->message = 'Error al actualizar la pagina';
            $this->type = 'error';
            $this->notificacion = true;
            return;
        }
        $this->message = 'Actualizado correctamente';
        $this->type = 'success';
        $this->notificacion = true;
        return redirect()->route('dashboard');
    }


    private function saveFile($file, $nombre_array)
    {
        try {
            Storage::disk('public')->delete($this->pagina->$nombre_array);
            $this->paginaArray[$nombre_array] =  $file->store('public/pagina', 'public');
        } catch (\Throwable $th) {
            $this->message = 'Error al actualizar la pagina';
            $this->type = 'error';
            $this->notificacion = true;
        }
    }

    public function render()
    {
        return view('livewire.dashboard.pagina.edit-pagina')->layout('layouts.dashboard');
    }
}
