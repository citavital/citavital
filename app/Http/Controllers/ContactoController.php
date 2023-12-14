<?php

namespace App\Http\Controllers;

use App\Mail\ContactoInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class ContactoController extends Controller
{
    public function index()
    {
        return Inertia::render('Contacto');
    }

    public function email(Request $request)
    {
        Mail::to('uip.bd2.citavital@gmail.com')
            ->send(new ContactoInfo($request->nombre, $request->email, $request->celular, $request->mensaje));

        return back()->with(['flash' => '']);
    }

}
