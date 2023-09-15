<?php

namespace App\Livewire\Dashboard\Noticias;

use App\Models\Noticias;
use Illuminate\Support\Facades\Request;
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

    public function mount($noticia)
    {
        $this->noticia = Noticias::find($noticia);
        $this->noticiaArray = [
            'titulo' => $this->noticia->titulo,
            'descripcion' => $this->noticia->descripcion,
            'url' => $this->noticia->url,
            'fecha' => $this->noticia->fecha,
            'imagen' => '',
        ];
    }

    public function save()
    {
        $this->validate(Noticias::$validate, Noticias::$messages);
        $this->saveFile($this->noticiaArray['imagen']);
        $this->convertirFechaALiteral($this->noticiaArray['fecha']);
        $new = Noticias::UpdateNoticia($this->noticia->id, $this->noticiaArray);
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
        $url = Request::getScheme() . '://' . Request::getHost();
        $this->noticiaArray['url'] =  $url . '/storage/' . $file->store('public/noticias', 'public');
    }

    public function render()
    {
        return view('livewire.dashboard.noticias.edit-noticias')->layout('layouts.dashboard');
    }
}
