<?php

namespace App\Http\Controllers;

use App\Models\Noticias;
use App\Models\Pagina;
use App\Models\Tramites;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $noticias = Noticias::orderBy('updated_at', 'desc')->paginate(4);
        $tramites = Tramites::orderBy('created_at', 'desc')->paginate(2);
        $pagina = Pagina::find(1);
        return view('welcome', compact('noticias', 'tramites', 'pagina'));
    }
}
