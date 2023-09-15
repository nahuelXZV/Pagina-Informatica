<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    use HasFactory;

    protected $fillable = [
        "titulo",
        "descripcion",
        "fecha",
        "url"
    ];

    // TODO VALIDATIONS
    static public $validate = [
        'noticiaArray.titulo' => 'required|max:30',
        'noticiaArray.descripcion' => 'required|max:100',
        'noticiaArray.fecha' => 'required',
        'noticiaArray.url' => 'required',
        'noticiaArray.imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
    ];
    static public $messages = [
        'noticiaArray.titulo.required' => 'El titulo es requerido',
        'noticiaArray.titulo.max' => 'El titulo no puede superar los 30 caracteres',
        'noticiaArray.descripcion.required' => 'La descripcion es requerida',
        'noticiaArray.descripcion.max' => 'La descripcion no puede superar los 100 caracteres',
        'noticiaArray.fecha.required' => 'La fecha es requerida',
        'noticiaArray.url.required' => 'La url es requerida',
        'noticiaArray.imagen.required' => 'La imagen es requerida',
        'noticiaArray.imagen.image' => 'La imagen debe ser una imagen valida',
        'noticiaArray.imagen.mimes' => 'La imagen debe ser una imagen valida'
    ];

    // Funciones
    static public function CreateNoticia(array $data)
    {
        $new = Noticias::create([
            "titulo" => $data['titulo'],
            "descripcion" => $data['descripcion'],
            "fecha" => $data['fecha'],
            "url" => $data['url']
        ]);
        return $new;
    }

    static public function UpdateNoticia($id, array $data)
    {
        $user = Noticias::find($id);
        if (!$user) return null;
        $user->titulo = $data['titulo'];
        $user->descripcion = $data['descripcion'];
        $user->fecha = $data['fecha'];
        $user->url = $data['url'];
        $user->save();
        return $user;
    }

    static public function DeleteNoticia($id)
    {
        $user = Noticias::find($id);
        if (!$user) return null;
        $user->delete();
        return $user;
    }

    static public function GetNoticiasPaginate($attribute, $order = "desc", $paginate)
    {
        $noticias = Noticias::where('titulo', 'ILIKE', '%' . strtolower($attribute) . '%')
            ->orWhere('fecha', 'ILIKE', '%' . strtolower($attribute) . '%')
            ->orderBy('id', $order)
            ->paginate($paginate);
        return $noticias;
    }

    static public function GetAllNoticias()
    {
        $noticias = Noticias::all();
        return $noticias;
    }

    static public function GetNoticia($id)
    {
        $noticia = Noticias::find($id);
        return $noticia;
    }
}
