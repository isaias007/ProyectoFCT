<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AlumnoFormRequest;
use Validator;

class AlumnosController extends Controller
{


    public function getHome()
    {

        return view('alumnos/home');
    }

    //Funcion para mostrar solo 10 alumnos en la vista de mostrado que solo tendra acceso Ivan
    public function getMostrado()
    {
        return view('alumnos/mostrado', ['arrayAlumnos' => Alumno::paginate(10)]);
    }
    //Funcion para mostrar solo 10 alumnos en la vista de mostradoForm que solo tendra acceso los profesores
    public function getMostradoForm(Request $request)
    {


        $ciclo = trim($request->input('ciclo')); //Lo cogemos por URL (método GET)
        $curso = trim($request->input('curso')); //Lo cogemos por URL (método GET)



        $arrayAlumnos = DB::table('alumnos')

            ->select()

            ->where('ciclo', 'LIKE', '%' . $ciclo . '%')
            ->where('curso', 'LIKE', '%' . $curso . '%')->paginate(10);



        return view('alumnos/mostradoForm', compact('arrayAlumnos', 'ciclo'));
    }


    public function getCreacion()
    {

        return view('alumnos/creacion');
    }




    //Funcion para actualizar las autorizaciones
    public function actualizarAutorizacion(Request $request)
    {
        if (!empty($request->input('autorizacion'))) {
            foreach ($request->input('autorizacion') as $auto => $value) {
                $array[] = $auto;
            }
        } else {
            $array = array();
        }


        $alumnos = Alumno::all();

        $rango = explode(",", $request->input('rangoAlumnos'));

        for ($i = 0; $i < count($alumnos); $i++) {
            if ($alumnos[$i]->autorizacion == 1 && !in_array($alumnos[$i]->id, $array)) {
                DB::table('alumnos')
                    ->where('id', $alumnos[$i]->id)
                    ->where('id', '>=', $rango[0])
                    ->where('id', '<=', $rango[1])
                    ->update(['autorizacion' => 0]);
            }
        }


        if (!empty($array)) {

            for ($i = 0; $i < count($array); $i++) {
                DB::table('alumnos')
                    ->where('id', $array[$i])
                    ->update(['autorizacion' => 1]);
            }
        }



        $request->session()->flash('correcto', 'Alumnos actualizados');

        return redirect('/check');
    }

    //Funcion para crear alumnos individualmente
    public function creacionIndividual(AlumnoFormRequest $request)
    {

        // $validator = Validator::make($request->all(), [
        //     'nombre' => 'required|max:40',
        //     'apellidos' => 'required|max:50',
        //     'curso' => 'required|regex:/^\d{4}\-\d{4}$/i',
        //     'ciclo' => 'required',
        //     'email' => 'required|regex:/^.+@.+$/i',
        //     'telefono' => 'required|regex:/^\d{9}$/i'
        // ]);

        // if ($validator->fails()) {
        //     return redirect('/crear')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }




        $alumno = new Alumno;

        $alumno->nombre = $request->input('nombre');
        $alumno->apellidos = $request->input('apellidos');
        $alumno->curso = $request->input('curso');
        $alumno->ciclo = $request->input('ciclo');
        $alumno->email = $request->input('email');
        $alumno->telefono = $request->input('telefono');
        $alumno->autorizacion = 0;

        $alumno->save();


        return redirect('/check');
    }
}
