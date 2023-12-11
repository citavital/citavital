<?php

namespace App\Http\Controllers;

use App\Models\HistorialPaciente;
use App\Http\Requests\StoreHistorialPacienteRequest;
use App\Http\Requests\UpdateHistorialPacienteRequest;
use Inertia\Inertia;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('App/Pacientes/PacientesIndex');
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
    public function show(HistorialPaciente $historialPaciente)
    {
        //
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
    public function update(UpdateHistorialPacienteRequest $request, HistorialPaciente $historialPaciente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HistorialPaciente $historialPaciente)
    {
        //
    }
}
