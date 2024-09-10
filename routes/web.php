<?php

use App\Http\Controllers\ContactoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacto/{tipo_usuario?}', [ContactoController::class, 'formularioContacto']);
Route::post('/guardar-formulario', [ContactoController::class, 'guardarFormulario']);
Route::get('/mensajes', [ContactoController::class, 'listado']);