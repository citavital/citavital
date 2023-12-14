<x-mail::message>
# Mensaje del doctor

Estimado(a) {{ $nombre }}, ha recibido un mensaje del Dr(a). {{ $doctor }}:

{{ $mensaje }}

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
