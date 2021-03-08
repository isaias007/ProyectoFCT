<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AlumnoFormRequest;

//Controlador para las funciones de los alumnos
class AlumnosController extends Controller
{
    //Funcion para redireccionar a la vista de /home
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
        //Estas variables sirven para el campo de busqueda por registro de la vista mostradoForm
        $ciclo = trim($request->input('ciclo'));
        $curso = trim($request->input('curso'));


        //Aqui buscamos mediante ciclo y curso
        $arrayAlumnos = DB::table('alumnos')

            ->select()

            ->where('ciclo', 'LIKE', '%' . $ciclo . '%')
            ->where('curso', 'LIKE', '%' . $curso . '%')->paginate(10);


        //Y retornamos la busqueda con el resultado
        return view('alumnos/mostradoForm', compact('arrayAlumnos', 'ciclo'));
    }

    //Funcion para redireccionar a la vista de creacion de alumno individual
    public function getCreacion()
    {
        return view('alumnos/creacion');
    }




    //Funcion para actualizar las autorizaciones de la vista mostradoForm
    public function actualizarAutorizacion(Request $request)
    {
        if (!empty($request->input('autorizacion'))) {
            //Este array contendra los inputs que se han seleccionado 
            foreach ($request->input('autorizacion') as $auto => $value) {
                $array[] = $auto;
            }
        } else {
            $array = array();
        }

        //El array de todos los alumnos
        $alumnos = Alumno::all();

        //Un rango de alumnos que se coge mediante el id con un input hidden en la vista
        $rango = explode(",", $request->input('rangoAlumnos'));

        //Un for para recorrer todos los alumnos de la base datos
        for ($i = 0; $i < count($alumnos); $i++) {
            //Y controlamos si tienen autorizacion en true y no estan en el array de seleccionado significa que estan siendo deseleccionado
            if ($alumnos[$i]->autorizacion == 1 && !in_array($alumnos[$i]->id, $array)) {
                //Y cambiamos el true por un false de los alumnos que esten en el rango anteriormente recogido
                DB::table('alumnos')
                    ->where('id', $alumnos[$i]->id)
                    ->where('id', '>=', $rango[0])
                    ->where('id', '<=', $rango[1])
                    ->update(['autorizacion' => 0]);
            }
        }


        if (!empty($array)) {
            //Y aqui recogemos el array de los alumnos seleccionados y ponemos autorizacion a true
            for ($i = 0; $i < count($array); $i++) {
                DB::table('alumnos')
                    ->where('id', $array[$i])
                    ->update(['autorizacion' => 1]);
            }
        }


        //Creamos una session para el flash message y redireccionamos a la vista
        $request->session()->flash('correcto', 'Alumnos actualizados');

        return redirect('/check');
    }

    //Funcion para crear alumnos individualmente
    public function creacionIndividual(AlumnoFormRequest $request)
    {

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
