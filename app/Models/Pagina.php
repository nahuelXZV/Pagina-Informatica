<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    use HasFactory;

    protected $fillable = [
        "imagen_principal",
        "calendario_academico",
        "plan_estudio",
        "url_facebook",
        "url_whatsapp",
        "telefono",
        "correo",
        "direccion"
    ];

    // TODO VALIDATIONS
    static public $validate = [
        'paginaArray.url_facebook' => 'required',
        'paginaArray.url_whatsapp' => 'required',
        'paginaArray.telefono' => 'required',
        'paginaArray.correo' => 'required',
        'paginaArray.direccion' => 'required',
        'paginaArray.imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'paginaArray.calendario' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'paginaArray.plan_estudio_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];
    static public $messages = [
        'paginaArray.url_facebook.required' => 'El campo facebook es obligatorio',
        'paginaArray.url_whatsapp.required' => 'El campo whatsapp es obligatorio',
        'paginaArray.telefono.required' => 'El campo telefono es obligatorio',
        'paginaArray.correo.required' => 'El campo correo es obligatorio',
        'paginaArray.direccion.required' => 'El campo direccion es obligatorio',
        'paginaArray.imagen.required' => 'El campo imagen es obligatorio',
        'paginaArray.imagen.image' => 'El campo imagen debe ser una imagen',
        'paginaArray.imagen.mimes' => 'El campo imagen debe ser una imagen de tipo: jpeg, png, jpg, gif, svg',
        'paginaArray.imagen.max' => 'El campo imagen debe ser una imagen de maximo 2048 kilobytes',
        'paginaArray.calendario.required' => 'El campo calendario es obligatorio',
        'paginaArray.calendario.image' => 'El campo calendario debe ser una imagen',
        'paginaArray.calendario.mimes' => 'El campo calendario debe ser una imagen de tipo: jpeg, png, jpg, gif, svg',
        'paginaArray.calendario.max' => 'El campo calendario debe ser una imagen de maximo 2048 kilobytes',
        'paginaArray.plan_estudio_file.required' => 'El campo plan_estudio es obligatorio',
        'paginaArray.plan_estudio_file.image' => 'El campo plan_estudio debe ser una imagen',
        'paginaArray.plan_estudio_file.mimes' => 'El campo plan_estudio debe ser una imagen de tipo: jpeg, png, jpg, gif, svg',
        'paginaArray.plan_estudio_file.max' => 'El campo plan_estudio debe ser una imagen de maximo 2048 kilobytes',
    ];

    // Funciones
    static public function UpdatePagina($id, array $data)
    {
        $pagina = Pagina::find($id);
        if (!$pagina) return null;
        $pagina->url_facebook = $data['url_facebook'];
        $pagina->url_whatsapp = $data['url_whatsapp'];
        $pagina->telefono = $data['telefono'];
        $pagina->correo = $data['correo'];
        $pagina->direccion = $data['direccion'];
        $pagina->calendario_academico = $data['calendario_academico'];
        $pagina->plan_estudio = $data['plan_estudio'];
        $pagina->imagen_principal = $data['imagen_principal'];
        $pagina->save();
        return $pagina;
    }

    static public function GetPagina($id)
    {
        $pagina = Pagina::find($id);
        return $pagina;
    }
}
