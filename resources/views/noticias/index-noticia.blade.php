<x-layout>
    <h1>Mensajes</h1>

    <p>
        <a href="{{ route('noticia.create') }}">Agregar Noticia</a>
    </p>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Fecha</th>
                <th>Categoria</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($noticias as $noticia)
            <tr>
                <td>{{ $noticia->id }}</td>
                <td>
                    <a href="{{ route('noticia.show', $noticia) }}">
                        {{ $noticia->titulo }}
                    </a>
                </td>
                <td>{{ $noticia->fecha->format('d/m/Y') }}</td>
                <td>
                    @foreach($noticia->categorias as $categoria)
                        {{ $categoria->tag }}, 
                    @endforeach
                </td>
                <td>{{ $noticia->user->name }}</td>
                <td>
                    <a href="{{ route('noticia.edit', $noticia) }}">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>