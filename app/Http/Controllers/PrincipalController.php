<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;

class PrincipalController extends Controller
{
    /**
     * Provision a new web server.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('principal', [
            'proyectos' => Proyecto::with(['informacion', 'habilidades:id,nombre'])->get(),
        ]);
    }
}
