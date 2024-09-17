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

Route::resource('noticia', NoticiaController::class)->parameters(['noticia' => 'noticia']);
