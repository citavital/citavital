<?php

namespace App\Http\Controllers;


use App\Models\HistorialPaciente;
use App\Models\User;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function lista(User $paciente)
    {
        $data = HistorialPaciente::where('tipo_historial', 'nota')
            ->where('paciente_id', $paciente->id)
            ->get();

        return compact('data');
    }

    public function store(Request $request, User $paciente)
    {
        $nota = new HistorialPaciente();
        $nota->paciente_id = $paciente->id;
        $nota->doctor_id = request()->user()->id;
        $nota->tipo_historial = 'nota';
        $nota->fecha = date('Y-m-d');
        $nota->comentarios = $request->nota;
        $nota->save();

        return back()->with([
            'nota' => $nota
        ]);
    }
}
