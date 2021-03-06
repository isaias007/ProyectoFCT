<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumno;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    //LLamamiento al factory y borrado de los registros de la tabla ya puestos
    public function run()
    {
        DB::table('alumnos')->delete();
        Alumno::factory()->count(10)->create();
       
    }
}
