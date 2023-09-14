<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\WelcomeController;
use App\Livewire\Dashboard;
use App\Livewire\Dashboard\Rol\EditRol;
use App\Livewire\Dashboard\Rol\ListRol;
use App\Livewire\Dashboard\Rol\NewRol;
use App\Livewire\Dashboard\Users\ListUsuario;
use App\Livewire\Dashboard\Users\NewUsuario;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/acerca', [PageController::class, 'acerca'])->name('acerca');
Route::get('/noticias', [PageController::class, 'noticias'])->name('noticias');
Route::get('/tramites', [PageController::class, 'tramites'])->name('tramites');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::group(['prefix' => 'usuario'], function () {
        Route::get('/list', ListUsuario::class)->name('usuario.list');
        Route::get('/new', NewUsuario::class)->name('usuario.new');
    });

    Route::group(['prefix' => 'rol'], function () {
        Route::get('/list', ListRol::class)->name('rol.list');
        Route::get('/new', NewRol::class)->name('rol.new');
        Route::get('/edit/{rol}', EditRol::class)->name('rol.edit');
    });
});
