<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function listado() {
        $mensajes = Contacto::all();
        
        return view('listado-contactos', compact('mensajes'));

        // return view('listado-contactos', ['mensajes' => $mensajes]);

        // return view('listado-contactos', ['mensajes' => Contacto::all()]);
    }

    public function formularioContacto() {
        return view('contacto');
    }

    public function guardarFormulario(Request $request) {
        // recibir datos // mediante $request

        // validar datos
        $request->validate([
            'nombre' => 'required|min:3|max:255',
            'correo' => 'required|email',
            'mensaje' => ['required', 'min:10'],
        ]);

        // guardar datos
        $contacto = new Contacto();
        $contacto->nombre = $request->nombre;
        $contacto->correo = $request->correo;
        $contacto->mensaje = $request->mensaje;
        $contacto->save();

        return redirect('/mensajes');
    }
}
