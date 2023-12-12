<?php

namespace App\Http\Controllers;

use App\Models\Hospital;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitales = Hospital::all();
        return compact('hospitales');
    }
}
