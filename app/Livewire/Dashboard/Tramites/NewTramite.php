<?php

namespace App\Livewire\Dashboard\Tramites;

use App\Models\Tramites;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class NewTramite extends Component
{
    use WithFileUploads;

    public $tramiteArray = [];
    public $notificacion = false;
    public $type = 'success';
    public $message = 'Creado correctamente';
    public $paths = [
        'public/tramites',
        'public/cartas'
    ];

    public function mount()
    {
        $this->tramiteArray = [
            'titulo' => '',
            'descripcion' => '',
            'fecha' => date('Y-m-d'),
            'imagen' => '',
            'carta' => '',
            'url_imagen' => '',
            'nombre_imagen' => '',
            'url_carta' => '',
            'nombre_carta' => '',
        ];
    }

    public function save()
    {
        $this->validate(Tramites::$validate, Tramites::$messages);
        $this->saveFile($this->tramiteArray['imagen'], $this->paths[0]);
        if ($this->tramiteArray['carta'])
            $this->saveFile($this->tramiteArray['carta'], $this->paths[1]);
        $this->convertirFechaALiteral($this->tramiteArray['fecha']);
        $new = Tramites::CreateTramite($this->tramiteArray);
        if (!$new) {
            $this->message = 'Error al crear el tramite';
            $this->type = 'error';
            $this->notificacion = true;
        }
        return redirect()->route('tramite.list');
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
        $this->tramiteArray['fecha'] = $dia . ' de ' . $meses[$mes] . ' del ' . $anio;
    }

    private function saveFile($file, $path)
    {
        $url = Request::getScheme() . '://' . Request::getHost();
        $nombre_file = $file->store($path, 'public');
        if ($path == $this->paths[0]) {
            $this->tramiteArray['url_imagen'] =  $url . '/storage/' .  $nombre_file;
            $this->tramiteArray['nombre_imagen'] = $nombre_file;
        } else {
            $this->tramiteArray['url_carta'] =  $url . '/storage/' .  $nombre_file;
            $this->tramiteArray['nombre_carta'] = $nombre_file;
        }
    }

    public function render()
    {
        return view('livewire.dashboard.tramites.new-tramite')->layout('layouts.dashboard');
    }
}
