<?php

namespace App\Livewire\Dashboard\Noticias;

use App\Models\Fotos;
use App\Models\Noticias;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class NewNoticias extends Component
{
    use WithFileUploads;

    public $noticiaArray = [];
    public $notificacion = false;
    public $type = 'success';
    public $message = 'Creado correctamente';

    public function mount()
    {
        $this->noticiaArray = [
            'titulo' => '',
            'slug' => '',
            'descripcion' => '',
            'fecha' => date('Y-m-d'),
            'imagen_principal' => '',
            'contenido' => '',
            'imagen' => '',
            'fotos' => ''
        ];
    }

    public function save()
    {
        $this->validate(Noticias::$validate, Noticias::$messages);
        $this->saveFile($this->noticiaArray['imagen']);
        $this->convertirFechaALiteral($this->noticiaArray['fecha']);
        $new = Noticias::CreateNoticia($this->noticiaArray);
        $this->saveFiles($new);
        if (!$new) {
            $this->message = 'Error al crear la noticia';
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
        $this->noticiaArray['imagen_principal'] =  $file->store('public/noticias', 'public');
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

    public function render()
    {
        return view('livewire.dashboard.noticias.new-noticias')->layout('layouts.dashboard');
    }
}
