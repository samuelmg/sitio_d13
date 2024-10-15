<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class NoticiaController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = Noticia::with('categorias')
            ->with('user:id,name,email')
            ->get();
        return view('noticias.index-noticia', compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('noticias.create-noticia', [
            'categorias' => Categoria::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => ['required', 'max:255'],
            'fecha' => ['required', 'date'],
            'noticia' => ['required'],
            'categorias' => ['required'],
        ]);

        
        // Auth::user()->noticias()->create($request->all());
        
        $request->merge([
            'user_id' => Auth::id(), // or auth()->id()
        ]);
        $noticia = Noticia::create($request->all());

        $noticia->categorias()->attach($request->categorias);

        return redirect()->route('noticia.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Noticia $noticia)
    {
        return view('noticias.show-noticia', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Noticia $noticia)
    {
        $categorias = Categoria::all();
        return view('noticias.edit-noticia', compact('noticia', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Noticia $noticia)
    {
        $noticia->update($request->all());
        $noticia->categorias()->sync($request->categorias);

        return redirect()->route('noticia.show', $noticia);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticia $noticia)
    {
        $noticia->delete();

        return redirect()->route('noticia.index');
    }
}
