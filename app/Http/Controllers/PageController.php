<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function acerca()
    {
        return view('pages.acercade');
    }

    public function noticias()
    {
        return view('pages.noticias');
    }

    public function tramites()
    {
        return view('pages.tramites');
    }
}
