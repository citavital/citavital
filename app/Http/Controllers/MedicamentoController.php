<?php

namespace App\Http\Controllers;


use App\Models\HistorialPaciente;
use App\Models\User;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function lista(User $paciente)
    {
        $data = HistorialPaciente::where('tipo_historial', 'medicamento')
            ->where('paciente_id', $paciente->id)
            ->get();

        return compact('data');
    }

    public function store(Request $request, User $paciente)
    {
        $medicamento = new HistorialPaciente();
        $medicamento->paciente_id = $paciente->id;
        $medicamento->doctor_id = request()->user()->id;
        $medicamento->tipo_historial = 'medicamento';
        $medicamento->fecha = date('Y-m-d');
        $medicamento->comentarios = $request->medicamento;
        $medicamento->save();

        return back()->with([
            'medicamento' => $medicamento
        ]);
    }
}
