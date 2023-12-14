<x-mail::message>
# Info de Contacto

## Ha llegado una nueva solicitud de contacto.

* Nombre: {{ $nombre }}
* Email: {{ $email }}
* Telefono/Celular: {{ $celular }}
* Mensaje: {{ $mensaje }}

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
