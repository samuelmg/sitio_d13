<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacto</title>
</head>
<body>
    <h1>Formulario de Contacto para {{ $tipo_usuario }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/guardar-formulario" method="POST">
        @csrf

        @if($tipo_usuario == 'cliente')
            <label for="no_cliente">No. de Cliente:</label><br>
            <input type="text" name="no_cliente" value="{{ old('no_cliente') }}" id="no_cliente"><br>
        @endif

        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" value="{{ old('nombre') }}"><br>

        <label for="correo">Correo:</label><br>
        <input type="email" name="correo" id="correo" value="{{ old('correo') }}">
        @error('correo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <label for="mensaje">Mensaje:</label><br>
        <textarea name="mensaje" cols="30" rows="4">{{ old('mensaje') }}</textarea><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>