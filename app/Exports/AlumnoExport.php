<?php

namespace App\Exports;

use App\Models\Alumno;
use Maatwebsite\Excel\Concerns\FromCollection;

class AlumnoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    //Funcion para exportar en archivo excel solo los alumnos que tienen la autorizacion aceptada
    public function collection()
    {
        return Alumno::where('autorizacion', "=" , 1)->get();
    }
}
