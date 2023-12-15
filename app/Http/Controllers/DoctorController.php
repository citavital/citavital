<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\DoctorEspecialidad;
use App\Http\Requests\StoreDoctorEspecialidadRequest;
use App\Http\Requests\UpdateDoctorEspecialidadRequest;
use App\Models\Hospital;
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
            ->with(['doctorHospital.hospital', 'doctorEspecialidad.especialidad', 'doctorTratamiento'])
            ->join('doctor_especialidades', 'doctor_especialidades.doctor_id', '=', 'users.id');

        if ($request->has('hospital'))
        {
            $query = $query->join('doctor_hospitales', 'doctor_hospitales.doctor_id', '=', 'users.id')
                ->where('doctor_hospitales.hospital_id', $request->hospital);
        }

        if ($request->has('especialidad'))
        {
            $query = $query->where('doctor_especialidades.especialidad_id', $request->especialidad);
        }

        return $query->distinct()->get();
    }

    public function agendar(Hospital $hospital, User $doctor, $fecha)
    {
        $citas = Cita::where('fecha', $fecha)
            ->where('hospital_id', $hospital->id)
            ->where('doctor_id', $doctor->id)
            ->where('cancelada', false)
            ->get();

        $horas = [];
        $remover = [];
        $disponibles = [
            '08:00',
            '09:00',
            '10:00',
            '11:00',
            '12:00',
            '13:00',
            '14:00',
            '15:00',
            '16:00',
            '17:00',
            '18:00',
            '19:00'
        ];

        foreach ($citas as $cita)
        {
            $hora = date('H:i', strtotime($cita->hora));
            if (array_search($hora, $horas) !== false)
            {
                continue;
            }

            $remover[] = $hora;
        }

        foreach ($disponibles as $i)
        {
            if (in_array($i, $remover))
            {
                continue;
            }

            $horas[] = $i;
        }

        return compact('horas');
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
