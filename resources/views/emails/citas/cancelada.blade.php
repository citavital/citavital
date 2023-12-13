<x-mail::message>
# Cita Cancelada

Su cita con el Dr(a) {{ $doctorNombre }}, el {{ $fecha }} a las {{ date('H:i', strtotime($hora)) }} ha sido cancelada.

<x-mail::button :url="$url">
Ver
</x-mail::button>

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
