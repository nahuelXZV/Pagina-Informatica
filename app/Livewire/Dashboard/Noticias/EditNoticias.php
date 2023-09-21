<?php

namespace App\Livewire\Dashboard\Noticias;

use App\Models\Fotos;
use App\Models\Noticias;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditNoticias extends Component
{
    use WithFileUploads;
    public $noticiaArray = [];
    public $notificacion = false;
    public $type = 'success';
    public $message = 'Creado correctamente';

    public $noticia;
    public $fotos = [];

    public function mount($noticia)
    {
        $this->noticia = Noticias::find($noticia);
        $this->fotos = Fotos::GetFotosByNoticia($this->noticia->id);
        $this->noticiaArray = [
            'titulo' => $this->noticia->titulo,
            'descripcion' => $this->noticia->descripcion,
            'imagen_principal' => $this->noticia->imagen_principal,
            'fecha' => $this->noticia->fecha,
            'contenido' => $this->noticia->contenido,
            'imagen' => '',
            'fotos' => []
        ];
    }

    public function save()
    {
        $validate = Noticias::$validate;
        if (!$this->noticiaArray['imagen'])
            unset($validate['noticiaArray.imagen']);
        if ($this->noticia->titulo == $this->noticiaArray['titulo'])
            unset($validate['noticiaArray.titulo']);
        $this->validate($validate, Noticias::$messages);
        if ($this->noticiaArray['imagen'])
            $this->saveFile($this->noticiaArray['imagen']);
        $this->convertirFechaALiteral($this->noticiaArray['fecha']);
        $new = Noticias::UpdateNoticia($this->noticia->id, $this->noticiaArray);
        $this->saveFiles($this->noticia);
        if (!$new) {
            $this->message = 'Error al actualizar la noticia';
            $this->type = 'error';
            $this->notificacion = true;
        }
        return redirect()->route('noticia.list');
    }

    private function convertirFechaALiteral($date)
    {
        $dia = date('d', strtotime($date));
        $mes = date('m', strtotime($date));
        $anio = date('Y', strtotime($date));
        $meses = [
            '01' => 'Enero',
            '02' => 'Febrero',
            '03' => 'Marzo',
            '04' => 'Abril',
            '05' => 'Mayo',
            '06' => 'Junio',
            '07' => 'Julio',
            '08' => 'Agosto',
            '09' => 'Setiembre',
            '10' => 'Octubre',
            '11' => 'Noviembre',
            '12' => 'Diciembre'
        ];
        $this->noticiaArray['fecha'] = $dia . ' de ' . $meses[$mes] . ' del ' . $anio;
    }

    private function saveFile($file)
    {
        try {
            Storage::disk('public')->delete($this->noticia->imagen_principal);
            $this->noticiaArray['imagen_principal'] = $file->store('public/noticias', 'public');
        } catch (\Throwable $th) {
            $this->message = 'Error al actualizar la noticia';
            $this->type = 'error';
            $this->notificacion = true;
        }
    }

    private function saveFiles($noticia)
    {
        foreach ($this->noticiaArray['fotos'] as $key => $value) {
            $nombre_imagen = $value->store('public/noticias', 'public');
            Fotos::SaveFoto([
                'nombre' => $value->getClientOriginalName(),
                'foto' => $nombre_imagen,
                'noticia_id' => $noticia->id
            ]);
        }
    }

    public function deleteFoto($id)
    {
        $foto = Fotos::DeleteFoto($id);
        if (!$foto) {
            $this->message = 'Error al eliminar la foto';
            $this->type = 'error';
            $this->notificacion = true;
        }
    }

    public function render()
    {
        $this->fotos = Fotos::GetFotosByNoticia($this->noticia->id);
        return view('livewire.dashboard.noticias.edit-noticias')->layout('layouts.dashboard');
    }
}
