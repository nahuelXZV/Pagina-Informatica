<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Fotos extends Model
{
    use HasFactory;

    protected $fillable = [
        "nombre",
        "foto",
        "noticia_id",
    ];

    // Funciones
    static public function SaveFoto(array $data)
    {
        $new = Fotos::create([
            'nombre' => $data['nombre'],
            'foto' => $data['foto'],
            'noticia_id' => $data['noticia_id'],
        ]);
        return $new;
    }

    static public function DeleteFoto($id)
    {
        $foto = Fotos::find($id);
        if (!$foto) return null;
        try {
            Storage::disk('public')->delete($foto->foto);
            $foto->delete();
        } catch (\Throwable $th) {
            return null;
        }
        return $foto;
    }

    static public function GetAllFotos()
    {
        $fotos = Fotos::all();
        return $fotos;
    }

    static public function GetFotosByNoticia($id)
    {
        $fotos = Fotos::where('noticia_id', $id)->get();
        return $fotos;
    }

    static public function GetFoto($id)
    {
        $foto = Fotos::find($id);
        return $foto;
    }
}
