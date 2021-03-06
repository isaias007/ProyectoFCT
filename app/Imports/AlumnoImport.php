<?php



namespace App\Imports;



use App\Models\Alumno;

use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithHeadingRow;



class AlumnoImport implements ToModel, WithHeadingRow

{

    /**

     * @param array $row

     *

     * @return \Illuminate\Database\Eloquent\Model|null

     */
    
    //Funcion para importar los alumnos metidos por csv y asi agilizar el proceso de ingreso de usuarios a la base de datos
    public function model(array $row)

    {

        return new Alumno([

            'nombre'     => $row['nombre'],

            'apellidos'    => $row['apellidos'],

            'curso'     => $row['curso'],

            'ciclo'     => $row['ciclo'],

            'email'     => $row['email'],

            'telefono'  => $row['telefono'],

            'autorizacion' => 0

        ]);

        
    }
}
