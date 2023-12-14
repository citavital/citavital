@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://citavitalassets.s3.amazonaws.com/images/logo.png" class="logo" alt="Cita Vital Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
