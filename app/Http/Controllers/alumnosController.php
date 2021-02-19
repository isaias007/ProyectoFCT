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


    public function getCreacion()
    {

        return view('alumnos/creacion');
    }




    //Funcion para actualizar las autorizaciones
    public function actualizarAutorizacion(Request $request, $id)
    {

        $alumno = Alumno::find($id);

        $alumno->autorizacion = $request->input('autorizacion');

        $alumno->save();

        return redirect('/check');
    }

    //Funcion para crear alumnos individualmente
    public function creacionIndividual(Request $request)
    {

        $alumno = new Alumno;

        $alumno->nombre = $request->input('nombre');
        $alumno->apellidos = $request->input('apellidos');
        $alumno->curso = $request->input('curso');
        $alumno->email = $request->input('email');
        $alumno->telefono = $request->input('telefono');
        $alumno->autorizacion = $request->input('autorizacion');

        $alumno->save();


        return redirect('/check');
    }
}
