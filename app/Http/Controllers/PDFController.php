<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//Controlador para crear pdf
class PDFController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function generatePDF()
    {
        //Seleccionamos en un array los alumnos que queremos que se pasen a la vista
        $arrayAlumnos = DB::table('alumnos')

        ->select()
        ->where('autorizacion','=',1)->get();


        //Definimos un arrat data con algunos datos que nos pueden servir como la fecha 
        $data = [
            'title' => 'Estos son los alumnos que dieron su autorizacion',
            'date' => date('m/d/Y'),
        ];
        
        //Y luego cargamos la vista junto con estos arrays para que se descargue un pdf con esos datos
        $pdf = PDF::loadView('alumnos/pdfAlumnos', ["Datos"=>$data, "Alumnos"=> $arrayAlumnos]);
    
        return $pdf->download('AlumnosAutrorizados.pdf');
    }


}
