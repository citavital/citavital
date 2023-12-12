<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Http\Requests\StoreSpecialtyRequest;
use App\Http\Requests\UpdateSpecialtyRequest;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Especialidad::orderBy('nombre')->get();
        return compact('data');
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
    public function store(StoreSpecialtyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Especialidad $specialty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Especialidad $specialty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpecialtyRequest $request, Especialidad $specialty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Especialidad $specialty)
    {
        //
    }
}
