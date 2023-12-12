<?php

namespace App\Http\Controllers;

use App\Models\DoctorEspecialidad;
use App\Http\Requests\StoreDoctorEspecialidadRequest;
use App\Http\Requests\UpdateDoctorEspecialidadRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('App/Doctores/DoctoresIndex');
    }

    public function listado(Request $request)
    {
        $query = User::select('users.*')
            ->with(['doctorHospital.hospital', 'doctorEspecialidad.especialidad'])
            ->join('doctor_especialidades', 'doctor_especialidades.doctor_id', '=', 'users.id');

        if ($request->has('hospital'))
        {
            $query = $query->join('doctor_hospitales', 'doctor_hospitales.doctor_id', '=', 'users.id')
                ->where('doctor_hospitales.hospital_id', $request->hospital);
        }

        $query = $query->where('doctor_especialidades.especialidad_id', $request->especialidad);

        return $query->distinct()->get();
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
    public function store(StoreDoctorEspecialidadRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DoctorEspecialidad $doctorEspecialidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DoctorEspecialidad $doctorEspecialidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorEspecialidadRequest $request, DoctorEspecialidad $doctorEspecialidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DoctorEspecialidad $doctorEspecialidad)
    {
        //
    }
}
