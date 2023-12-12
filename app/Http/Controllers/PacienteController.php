<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePacienteRequest;
use App\Models\HistorialPaciente;
use App\Http\Requests\StoreHistorialPacienteRequest;
use App\Http\Requests\UpdateHistorialPacienteRequest;
use App\Models\User;
use Inertia\Inertia;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paciente = request()->user();

        if ($paciente->tipo_usuario != 'paciente')
        {
            abort(403);
        }

        $me = collect([
            'id' => $paciente->id,
            'name' => $paciente->name,
            'email' => $paciente->email,
            'genero' => $paciente->genero,
            'tipo_usuario' => $paciente->tipo_usuario,
            'direccion' => $paciente->direccion,
            'telefono' => $paciente->telefono,
            'celular' => $paciente->celular,
            'altura' => $paciente->altura,
            'tipo_altura' => $paciente->tipo_altura,
            'peso' => $paciente->peso,
            'tipo_peso' => $paciente->tipo_peso,
            'imc' => $paciente->imc,
            'presion_arterial' => $paciente->presion_arterial,
            'alergias' => $paciente->alergias,
            'nacimiento' => $paciente->nacimiento,
        ]);

        return Inertia::render('App/Pacientes/PacientesIndex', compact('me'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHistorialPacienteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $paciente)
    {
        $user = auth()->user();

        if ($paciente->tipo_usuario != 'paciente' || $user->tipo_usuario != 'doctor')
        {
            abort(403);
        }

        $me = collect([
            'id' => $paciente->id,
            'name' => $paciente->name,
            'email' => $paciente->email,
            'genero' => $paciente->genero,
            'tipo_usuario' => $paciente->tipo_usuario,
            'direccion' => $paciente->direccion,
            'telefono' => $paciente->telefono,
            'celular' => $paciente->celular,
            'altura' => $paciente->altura,
            'tipo_altura' => $paciente->tipo_altura,
            'peso' => $paciente->peso,
            'tipo_peso' => $paciente->tipo_peso,
            'imc' => $paciente->imc,
            'presion_arterial' => $paciente->presion_arterial,
            'alergias' => $paciente->alergias,
            'nacimiento' => $paciente->nacimiento,
        ]);

        $myProfile = false;

        return Inertia::render('App/Pacientes/PacientesIndex', compact('me', 'myProfile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HistorialPaciente $historialPaciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePacienteRequest $request, User $paciente)
    {
        $paciente->nacimiento = $request->nacimiento;
        $paciente->direccion = $request->direccion;
        $paciente->celular = $request->celular;
        $paciente->telefono = $request->telefono;
        $paciente->genero = $request->genero;
        $paciente->altura = $request->altura;
        $paciente->tipo_altura = $request->tipo_altura;
        $paciente->peso = $request->peso;
        $paciente->tipo_peso = $request->tipo_peso;
        $paciente->imc = $request->imc;
        $paciente->presion_arterial = $request->presion_arterial;
        $paciente->alergias = $request->alergias;

        $paciente->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HistorialPaciente $historialPaciente)
    {
        //
    }
}
