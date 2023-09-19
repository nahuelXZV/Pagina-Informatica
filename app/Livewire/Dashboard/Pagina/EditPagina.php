<?php

namespace App\Livewire\Dashboard\Pagina;

use App\Models\Pagina;
use Illuminate\Support\Facades\Request;
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
    public $validateArray = ['imagen', 'calendario', 'plan_estudio'];
    public $urlArray = ['url_imagen_principal', 'url_calendario_academico', 'url_plan_estudio'];
    public $nombreArray = ['nombre_imagen', 'nombre_calendario', 'nombre_plan_estudio'];

    public function mount()
    {
        $this->pagina = Pagina::find(1);
        $this->paginaArray = [
            'telefono' => $this->pagina->telefono,
            'correo' => $this->pagina->correo,
            'direccion' => $this->pagina->direccion,
            'url_facebook' => $this->pagina->url_facebook,
            'url_whatsapp' => $this->pagina->url_whatsapp,
            'url_imagen_principal' => $this->pagina->url_imagen_principal,
            'url_calendario_academico' => $this->pagina->url_calendario_academico,
            'url_plan_estudio' => $this->pagina->url_plan_estudio,
            'nombre_imagen' => $this->pagina->nombre_imagen,
            'nombre_calendario' => $this->pagina->nombre_calendario,
            'nombre_plan_estudio' => $this->pagina->nombre_plan_estudio,
            'imagen' => '',
            'calendario' => '',
            'plan_estudio' => '',
        ];
    }

    public function save()
    {
        $validate = Pagina::$validate;
        foreach ($this->validateArray as $key => $value) {
            if (!$this->paginaArray[$value])
                unset($validate["paginaArray." . $value]);
            else
                $this->saveFile($this->paginaArray[$value], $this->urlArray[$key], $this->nombreArray[$key]);
        }
        $this->validate($validate, Pagina::$messages);
        $new = Pagina::UpdatePagina($this->pagina->id, $this->paginaArray);
        if (!$new) {
            $this->message = 'Error al actualizar la pagina';
            $this->type = 'error';
            $this->notificacion = true;
        }
        return redirect()->route('pagina.edit');
    }


    private function saveFile($file, $urlAtribute, $name)
    {
        try {
            Storage::disk('public')->delete($this->pagina->$name);
            $url = Request::getScheme() . '://' . Request::getHost();
            $nombre_imagen = $file->store('public/pagina', 'public');
            $this->paginaArray[$urlAtribute] =  $url . '/storage/' .  $nombre_imagen;
            $this->paginaArray[$name] = $nombre_imagen;
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
