<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\WelcomeController;
use App\Livewire\Dashboard;
use App\Livewire\Dashboard\Noticias\EditNoticias;
use App\Livewire\Dashboard\Noticias\ListNoticias;
use App\Livewire\Dashboard\Noticias\NewNoticias;
use App\Livewire\Dashboard\Noticias\ShowNoticia;
use App\Livewire\Dashboard\Pagina\EditPagina;
use App\Livewire\Dashboard\Perfil\Show;
use App\Livewire\Dashboard\Rol\EditRol;
use App\Livewire\Dashboard\Rol\ListRol;
use App\Livewire\Dashboard\Rol\NewRol;
use App\Livewire\Dashboard\Tramites\EditTramite;
use App\Livewire\Dashboard\Tramites\ListTramite;
use App\Livewire\Dashboard\Tramites\NewTramite;
use App\Livewire\Dashboard\Users\ListUsuario;
use App\Livewire\Dashboard\Users\NewUsuario;
use App\Livewire\Public\ListTramites;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ruta '/' redirigir a home
Route::redirect('/', '/home');
Route::get('/home', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/acerca', [PageController::class, 'acerca'])->name('acerca');
Route::get('/noticias', [PageController::class, 'noticias'])->name('noticias');
Route::get('/noticias/{slug}', ShowNoticia::class)->name('noticias.show');
Route::get('/tramites', [PageController::class, 'tramites'])->name('tramites');
Route::get('/plan_estudio', [PageController::class, 'plan_estudio'])->name('plan_estudio');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::group(['prefix' => 'usuario', 'middleware' => ['can:usuarios', 'auth']], function () {
        Route::get('/list', ListUsuario::class)->name('usuario.list');
        Route::get('/new', NewUsuario::class)->name('usuario.new');
    });

    Route::group(['prefix' => 'rol', 'middleware' => ['can:roles', 'auth']], function () {
        Route::get('/list', ListRol::class)->name('rol.list');
        Route::get('/new', NewRol::class)->name('rol.new');
        Route::get('/edit/{rol}', EditRol::class)->name('rol.edit');
    });

    Route::group(['prefix' => 'noticia', 'middleware' => ['can:noticias', 'auth']], function () {
        Route::get('/list', ListNoticias::class)->name('noticia.list');
        Route::get('/new', NewNoticias::class)->name('noticia.new');
        Route::get('/edit/{noticia}', EditNoticias::class)->name('noticia.edit');
    });

    Route::group(['prefix' => 'tramite', 'middleware' => ['can:tramites', 'auth']], function () {
        Route::get('/list', ListTramite::class)->name('tramite.list');
        Route::get('/new', NewTramite::class)->name('tramite.new');
        Route::get('/edit/{tramite}', EditTramite::class)->name('tramite.edit');
    });

    Route::group(['prefix' => 'pagina', 'middleware' => ['can:pagina', 'auth']], function () {
        Route::get('/edit', EditPagina::class)->name('pagina.edit');
    });
    Route::group(['prefix' => 'perfil'], function () {
        Route::get('/show', Show::class)->name('profile');
    });
});
Livewire::setScriptRoute(function ($handle) {
    return Route::get('/custom/livewire/livewire.js', $handle);
});
