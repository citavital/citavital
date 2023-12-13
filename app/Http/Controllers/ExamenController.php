<?php

namespace App\Http\Controllers;


use App\Models\HistorialPaciente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ExamenController extends Controller
{
    public function lista(User $paciente)
    {
        $data = HistorialPaciente::where('tipo_historial', 'examen')
            ->where('paciente_id', $paciente->id)
            ->get();

        return compact('data');
    }

    public function show(User $paciente, HistorialPaciente $examen)
    {
        if (empty($examen->file_url))
        {
            abort(404);
        }

        $content = Storage::get($examen->file_url);
        $mimeType = Storage::mimeType($examen->file_url);

        return response($content, 200, [
            'Content-Type' => $mimeType,
        ]);
    }

    public function store(Request $request, User $paciente)
    {
        $nota = new HistorialPaciente();
        $nota->paciente_id = $paciente->id;
        $nota->doctor_id = request()->user()->id;
        $nota->tipo_historial = 'examen';
        $nota->fecha = date('Y-m-d');
        $nota->comentarios = $request->examen;

        if ($request->hasFile('file'))
        {
            $file = $request->file('file');
            $route = "/pacientes/{$paciente->id}/examenes";
            $path = Storage::put($route, $file);

            $nota->file_url = $path;
        }

        $nota->save();

        return back()->with([
            'nota' => $nota
        ]);
    }
}
