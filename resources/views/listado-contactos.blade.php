<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Mensajes</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Mensaje</th>
                <th>Estatus</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mensajes as $mensaje)
            <tr>
                <td>{{ $mensaje->nombre }}</td>
                <td>{{ $mensaje->correo }}</td>
                <td>{{ $mensaje->mensaje }}</td>
                <td>{{ $mensaje->estatus }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>