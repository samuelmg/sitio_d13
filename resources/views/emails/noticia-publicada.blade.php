<x-mail::message>
# Se publicó una nueva noticia

## {{ $noticia->titulo }}

<x-mail::panel>
{{ $noticia->cuerpo }}
</x-mail::panel> 

<x-mail::button :url="route('noticia.show', $noticia)">
Ver Noticia
</x-mail::button>

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
