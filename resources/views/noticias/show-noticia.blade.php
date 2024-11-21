<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalle noticias</title>
</head>
<body>
    <h1>{{ $noticia->titulo }}</h1>
    <p>
        {{ $noticia->noticia }}
    </p>
    <p>
        <ul>
            <li>Fecha: {{ $noticia->fecha }}</li>
            <li>Categoría: {{ $noticia->categoria }}</li>
        </ul>
    </p>
    <hr>
    <h2>Archivos</h2>
    <ul>
        @foreach ($noticia->archivos as $archivo)
            <li>
                <a href="{{ route('descargar', $archivo) }}">
                    {{ $archivo->nombre_original }}
                </a>
            </li>
        @endforeach
    </ul>

    @foreach ($noticia->archivos as $archivo)
        <img src="{{ asset('/storage/'.$archivo->ruta) }}" alt="prueba" width="400">
    @endforeach



    <hr>
    <a href="{{ route('noticia.edit', $noticia) }}">Editar</a><br>

    <form action="{{ route('noticia.destroy', $noticia) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Borrar">
    </form>
</body>
</html>