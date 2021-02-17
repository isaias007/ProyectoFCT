<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class alumnosController extends Controller
{

    public function getMostrado()
    {
        return view('alumnos/mostrado', ['arrayAlumnos'=>Alumno::paginate(10)]);

    }

    public function getMostradoForm()
    {

        return view('alumnos/mostradoForm', ['arrayAlumnos'=>Alumno::paginate(10)]);

    }
}
