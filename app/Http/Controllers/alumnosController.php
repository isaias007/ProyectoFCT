<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class alumnosController extends Controller
{

//Funcion para mostrar solo 10 alumnos en la vista de mostrado que solo tendra acceso Ivan
    public function getMostrado()
    {
        return view('alumnos/mostrado', ['arrayAlumnos' => Alumno::paginate(10)]);
    }
//Funcion para mostrar solo 10 alumnos en la vista de mostradoForm que solo tendra acceso los profesores
    public function getMostradoForm()
    {

        return view('alumnos/mostradoForm', ['arrayAlumnos' => Alumno::paginate(10)]);
    }

//Funcion para actualizar las autorizaciones
    public function actualizarAutorizacion(Request $request, $id)
    {
    
        $alumno = Alumno::find($id);

        $alumno->autorizacion = $request->input('autorizacion');

        return redirect('/check');

    }
}
