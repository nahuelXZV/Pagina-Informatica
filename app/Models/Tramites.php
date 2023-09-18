<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Tramites extends Model
{
    use HasFactory;

    protected $fillable = [
        "titulo",
        "descripcion",
        "fecha",
        "url_imagen",
        "nombre_imagen",
        "url_carta",
        "nombre_carta"
    ];

    // TODO VALIDATIONS
    static public $validate = [
        'tramiteArray.titulo' => 'required|max:30',
        'tramiteArray.descripcion' => 'required|max:100',
        'tramiteArray.fecha' => 'required',
        'tramiteArray.imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    ];
    static public $messages = [
        'tramiteArray.titulo.required' => 'El titulo es requerido',
        'tramiteArray.titulo.max' => 'El titulo no puede superar los 30 caracteres',
        'tramiteArray.descripcion.required' => 'La descripcion es requerida',
        'tramiteArray.descripcion.max' => 'La descripcion no puede superar los 100 caracteres',
        'tramiteArray.fecha.required' => 'La fecha es requerida',
        'tramiteArray.imagen.required' => 'La imagen es requerida',
        'tramiteArray.imagen.image' => 'La imagen debe ser una imagen valida',
        'tramiteArray.imagen.mimes' => 'La imagen debe ser una imagen valida'
    ];

    // Funciones
    static public function CreateTramite(array $data)
    {
        $new = Tramites::create([
            "titulo" => $data['titulo'],
            "descripcion" => $data['descripcion'],
            "fecha" => $data['fecha'],
            "url_imagen" => $data['url_imagen'],
            "nombre_imagen" => $data['nombre_imagen'],
            "url_carta" => $data['url_carta'] ?? null,
            "nombre_carta" => $data['nombre_carta'] ?? null,
        ]);
        return $new;
    }

    static public function UpdateTramite($id, array $data)
    {
        $tramite = Tramites::find($id);
        if (!$tramite) return null;
        $tramite->titulo = $data['titulo'];
        $tramite->descripcion = $data['descripcion'];
        $tramite->fecha = $data['fecha'];
        $tramite->url_imagen = $data['url_imagen'];
        $tramite->nombre_imagen = $data['nombre_imagen'];
        $tramite->url_carta = $data['url_carta'] ?? null;
        $tramite->nombre_carta = $data['nombre_carta'] ?? null;
        $tramite->save();
        return $tramite;
    }

    static public function DeleteTramite($id)
    {
        $tramite = Tramites::find($id);
        if (!$tramite) return null;
        try {
            if ($tramite->url_imagen)
                Storage::disk('public')->delete($tramite->nombre_imagen);
            if ($tramite->url_carta)
                Storage::disk('public')->delete($tramite->nombre_carta);
            $tramite->delete();
        } catch (\Throwable $th) {
            return null;
        }
        return $tramite;
    }

    static public function GetTramitesPaginate($attribute, $order = "desc", $paginate)
    {
        $tramites = Tramites::where('titulo', 'ILIKE', '%' . strtolower($attribute) . '%')
            ->orWhere('fecha', 'ILIKE', '%' . strtolower($attribute) . '%')
            ->orderBy('id', $order)
            ->paginate($paginate);
        return $tramites;
    }

    static public function GetAllTramite()
    {
        $tramites = Tramites::all();
        return $tramites;
    }

    static public function GetTramite($id)
    {
        $tramite = Tramites::find($id);
        return $tramite;
    }
}
