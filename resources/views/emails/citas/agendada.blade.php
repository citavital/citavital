<x-mail::message>
# Cita Agendada

Felicidades, su cita ha sido agendada con el Dr(a) {{ $doctorNombre }}, el {{ $fecha }} a las {{ date('H:i', strtotime($hora)) }}.

<x-mail::button :url="$url">
Ver
</x-mail::button>

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
