<?php

namespace App\Http\Controllers;

use App\Mail\CitaAgendada;
use App\Mail\CitaCancelada;
use App\Models\Cita;
use App\Models\Doctor;
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

        if (request()->has('mostrar'))
        {
            $mostrar = request()->get('mostrar');
        }

        $citas = Cita::with(['doctor', 'hospital'])
            ->where('usuario_id', request()->user()->id);

        if ($mostrar == 'pasadas')
        {
            $citas = $citas->where('fecha', '<=', date('Y-m-d'))
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
        return Inertia::render('App/Citas/CitasShow');
    }

    public function destroy(Cita $cita)
    {
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
