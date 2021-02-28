<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function generatePDF()
    {

        $arrayAlumnos = Alumno::where('autorizacion', 1)->get();

        $Nombres = "Nombres = ";
        $Apellidos = "Apellidos =";

        for($i = 0; $i<count($arrayAlumnos); $i++){

            $var1 = $arrayAlumnos[$i]->nombre;
            $var2 = $arrayAlumnos[$i]->apellidos;

            $Nombres = $Nombres . "|||" .  $var1;
            $Apellidos = $Apellidos . "|||" .  $var2;

            $var1 = "";
            $var2 = "";

        }



        $data = [
            'title' => 'Estos son los alumnos que dieron su autorizacion',
            'date' => date('m/d/Y'),
            'Nombres'=>$Nombres,
            'Apellidos'=>$Apellidos
        ];
          
        $pdf = PDF::loadView('alumnos/pdfAlumnos', $data);
    
        return $pdf->download('AlumnosAutrorizados.pdf');
    }


}
