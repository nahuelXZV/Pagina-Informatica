<?php

namespace App\Livewire\Dashboard\Tramites;

use App\Models\Tramites;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditTramite extends Component
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

    public $tramite;

    public function mount($tramite)
    {
        $this->tramite = Tramites::find($tramite);
        $this->tramiteArray = [
            'titulo' => $this->tramite->titulo,
            'descripcion' => $this->tramite->descripcion,
            'fecha' => $this->tramite->fecha,
            'url_imagen' => $this->tramite->url_imagen,
            'nombre_imagen' => $this->tramite->nombre_imagen,
            'url_carta' => $this->tramite->url_carta,
            'nombre_carta' => $this->tramite->nombre_carta,
            'imagen' => '',
            'carta' => ''
        ];
    }

    public function save()
    {
        $validate = Tramites::$validate;
        if (!$this->tramiteArray['imagen'])
            unset($validate['tramiteArray.imagen']);
        $this->validate($validate, Tramites::$messages);
        if ($this->tramiteArray['imagen'])
            $this->saveFile($this->tramiteArray['imagen'], $this->paths[0]);
        if ($this->tramiteArray['carta'])
            $this->saveFile($this->tramiteArray['carta'], $this->paths[1]);
        $new = Tramites::UpdateTramite($this->tramite->id, $this->tramiteArray);
        if (!$new) {
            $this->message = 'Error al actualizar el tramite';
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
        try {
            $url = Request::getScheme() . '://' . Request::getHost();
            $nombre_file = $file->store($path, 'public');
            if ($path == $this->paths[0]) {
                $this->tramiteArray['url_imagen'] =  $url . '/storage/' .  $nombre_file;
                $this->tramiteArray['nombre_imagen'] = $nombre_file;
            } else {
                $this->tramiteArray['url_carta'] =  $url . '/storage/' .  $nombre_file;
                $this->tramiteArray['nombre_carta'] = $nombre_file;
            }
        } catch (\Throwable $th) {
            $this->message = 'Error al actualizar el tramite';
            $this->type = 'error';
            $this->notificacion = true;
        }
    }

    public function render()
    {
        return view('livewire.dashboard.tramites.edit-tramite')->layout('layouts.dashboard');
    }
}
