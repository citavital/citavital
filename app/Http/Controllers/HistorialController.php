<?php

namespace App\Http\Controllers;

use App\Models\HistorialPaciente;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('App/Historiales/HistorialesIndex');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HistorialPaciente $historial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HistorialPaciente $historial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HistorialPaciente $historial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HistorialPaciente $historial)
    {
        //
    }
}
