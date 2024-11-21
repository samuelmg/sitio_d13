<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\NoticiaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacto/{tipo_usuario?}', [ContactoController::class, 'formularioContacto']);
Route::post('/guardar-formulario', [ContactoController::class, 'guardarFormulario']);
Route::get('/mensajes', [ContactoController::class, 'listado']);

Route::get('/descarga/{archivo}', [NoticiaController::class, 'descargar'])
    ->name('descargar');
Route::resource('noticia', NoticiaController::class)
    ->parameters(['noticia' => 'noticia']);
    //->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/landing', function () {
    return view('landing');
});
