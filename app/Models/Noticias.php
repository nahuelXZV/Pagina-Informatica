<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Noticias extends Model
{
    use HasFactory;

    protected $fillable = [
        "titulo",
        "slug",
        "descripcion",
        "fecha",
        "imagen_principal",
        "contenido"
    ];

    // TODO VALIDATIONS
    static public $validate = [
        'noticiaArray.titulo' => 'required|max:30|unique:noticias,titulo',
        'noticiaArray.descripcion' => 'required|max:100',
        'noticiaArray.fecha' => 'required',
        'noticiaArray.imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        'noticiaArray.contenido' => 'nullable|string'
    ];
    static public $messages = [
        'noticiaArray.titulo.required' => 'El titulo es requerido',
        'noticiaArray.titulo.max' => 'El titulo no puede superar los 30 caracteres',
        'noticiaArray.titulo.unique' => 'El titulo ya existe, ingrese otro titulo',
        'noticiaArray.descripcion.required' => 'La descripcion es requerida',
        'noticiaArray.descripcion.max' => 'La descripcion no puede superar los 100 caracteres',
        'noticiaArray.fecha.required' => 'La fecha es requerida',
        'noticiaArray.imagen.required' => 'La imagen es requerida',
        'noticiaArray.imagen.image' => 'La imagen debe ser una imagen valida',
        'noticiaArray.imagen.mimes' => 'La imagen debe ser una imagen valida',
        'noticiaArray.contenido.string' => 'El contenido debe ser un texto'
    ];

    // Funciones
    static public function CreateNoticia(array $data)
    {
        $new = Noticias::create([
            "titulo" => $data['titulo'],
            "descripcion" => $data['descripcion'],
            'slug' => strtolower(str_replace(' ', '-', $data['titulo'])),
            "fecha" => $data['fecha'],
            "imagen_principal" => $data['imagen_principal'],
            "contenido" => $data['contenido'] ?? null
        ]);
        return $new;
    }

    static public function UpdateNoticia($id, array $data)
    {
        $noticia = Noticias::find($id);
        if (!$noticia) return null;
        $noticia->titulo = $data['titulo'];
        $noticia->slug = strtolower(str_replace(' ', '-', $data['titulo']));
        $noticia->descripcion = $data['descripcion'];
        $noticia->fecha = $data['fecha'];
        $noticia->imagen_principal = $data['imagen_principal'];
        $noticia->contenido = $data['contenido'] ?? null;
        $noticia->save();
        return $noticia;
    }

    static public function DeleteNoticia($id)
    {
        $noticia = Noticias::find($id);
        if (!$noticia) return null;
        try {
            Storage::disk('public')->delete($noticia->imagen_principal);
            $noticia->delete();
        } catch (\Throwable $th) {
            return null;
        }
        return $noticia;
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

    static public function GetNoticiaBySlug($slug)
    {
        $noticia = Noticias::where('slug', $slug)->first();
        return $noticia;
    }
}
