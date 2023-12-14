<?php

namespace App\Http\Controllers;

use App\Mail\CitaAgendada;
use App\Mail\CitaCancelada;
use App\Models\Cita;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class CitaController extends Controller
{
    public function index()
    {
        return Inertia::render('App/Citas/CitasIndex');
    }

    public function lista()
    {
        $mostrar = 'actuales';
        $user = request()->user();

        if (request()->has('mostrar'))
        {
            $mostrar = request()->get('mostrar');
        }

        $citas = Cita::with(['doctor', 'hospital', 'paciente']);

        if ($user->tipo_usuario == 'paciente')
        {
            $citas = $citas->where('usuario_id', $user->id);
        }
        else if ($user->tipo_usuario == 'doctor')
        {
            $citas = $citas->where('doctor_id', $user->id);
        }

        if ($mostrar == 'pasadas')
        {
            $citas = $citas->where('fecha', '<', date('Y-m-d'))
                ->where('cancelada', false);
        }
        else if($mostrar == 'actuales')
        {
            $citas = $citas->where('fecha', '>=', date('Y-m-d'))
                ->where('cancelada', false);
        }
        else
        {
            $citas = $citas->where('cancelada', true);
        }

        $citas = $citas->orderBy('fecha')->get();

        return compact('citas');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        $user = request()->user();
        $doctor = User::findOrFail($request->doctor);

        $cita = new Cita();
        $cita->usuario_id = $user->id;
        $cita->doctor_id = $request->doctor;
        $cita->hospital_id = $request->hospital;
        $cita->fecha = $request->fecha;
        $cita->hora = $request->hora;
        $cita->save();

        Mail::to($user)->send(new CitaAgendada($cita, $user, $doctor));

        DB::commit();

        return response()->json(['exito' => true]);
    }

    public function show(Cita $cita)
    {
        $user = request()->user()->id;

        if ($cita->usuario_id != $user && $cita->doctor_id !== $user)
        {
            abort(404);
        }

        $paciente = User::findOrFail($cita->usuario_id);
        $doctor = User::findOrFail($cita->doctor_id);
        $hospital = Hospital::findOrFail($cita->hospital_id);

        return Inertia::render('App/Citas/CitasShow')->with([
            'cita' => $cita,
            'doctor' => $doctor,
            'paciente' => $paciente,
            'hospital' => $hospital,
        ]);
    }

    public function destroy(Cita $cita)
    {
        $user = request()->user()->id;

        if ($cita->usuario_id != $user && $cita->doctor_id !== $user)
        {
            abort(404);
        }

        if ($cita->cancelada || $cita->fecha < date('Y-m-d'))
        {
            return response()->json(['exito' => true]);
        }

        DB::beginTransaction();

        $user = request()->user();
        $doctor = Doctor::findOrFail($cita->doctor_id);

        $cita->cancelada = true;
        $cita->save();

        Mail::to($user)->send(new CitaCancelada($cita, $user, $doctor));

        DB::commit();

        return response()->json(['exito' => true]);
    }
}
