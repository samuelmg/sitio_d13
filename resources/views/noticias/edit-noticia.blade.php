<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Noticias</title>
</head>
<body>
    <h1>Crear noticia</h1>

    <form action="{{ route('noticia.update', $noticia) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="titulo">Titulo:</label><br>
        <input type="text" name="titulo" value="{{ old('titulo') ?? $noticia->titulo }}"><br>

        <label for="fecha">Fecha:</label><br>
        <input type="date" name="fecha" id="fecha" value="{{ old('fecha') ?? $noticia->fecha }}">

        <label for="noticia">Noticia:</label><br>
        <textarea name="noticia" cols="30" rows="4">{{ old('noticia') ?? $noticia->noticia }}</textarea><br>

        <label for="categoria">Categoría:</label>
        <select name="categorias[]" id="categoria" multiple>
            @foreach ($categorias as $categoria)
                <option @selected(in_array($categoria->id, $noticia->categorias()->pluck('categorias.id')->toArray())) value="{{ $categoria->id }}">
                    {{ $categoria->tag }}
                </option>
            @endforeach
        </select>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>