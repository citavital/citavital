<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class CitaController extends Controller
{
    public function index()
    {
        return Inertia::render('App/Citas/CitasIndex');
    }
}
