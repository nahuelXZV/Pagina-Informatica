<?php

namespace App\Http\Controllers;

use App\Models\Noticias;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $noticias = Noticias::orderBy('created_at', 'desc')->paginate(4);
        return view('welcome', compact('noticias'));
    }
}
