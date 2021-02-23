<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LengthException;

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
    public function actualizarAutorizacion(Request $request)
    {
        foreach ($request->input('autorizacion') as $auto => $value) {
                $array[] = $auto;
        }

        for ($i = 0; $i < count($array); $i++) {

            DB::table('alumnos')
            ->where('id', $array[$i])
            ->update(['autorizacion' => 1]);
                
        }

        $alumnos = Alumno::all();

        for($i = 0; $i < count($alumnos); $i++){
            if(in_array($alumnos[$i]->id, $array) == false){
                DB::table('alumnos')
                ->where('id', $alumnos[$i]->id)
                ->update(['autorizacion' => 0]);
            }
        }


    


        // Alumno::where('autorizacion', '!=', $request->boolean('autorizacion'))
        //     ->update(['autorizacion' => $request->boolean('autorizacion')]);


        return redirect('/check');
    }

    //Funcion para crear alumnos individualmente
    public function creacionIndividual(Request $request)
    {

        $aut = null;

        if ($request->input('autorizacion') == null) {
            $aut = 0;
        } else {
            $aut = 1;
        }

        $alumno = new Alumno;

        $alumno->nombre = $request->input('nombre');
        $alumno->apellidos = $request->input('apellidos');
        $alumno->curso = $request->input('curso');
        $alumno->email = $request->input('email');
        $alumno->telefono = $request->input('telefono');
        $alumno->autorizacion = $aut;

        $alumno->save();


        return redirect('/check');
    }
}
