<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class AyudaController extends Controller
{
    public function index()
    {
        return Inertia::render('Ayuda');
    }
}
