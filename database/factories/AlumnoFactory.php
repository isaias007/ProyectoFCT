<?php

namespace Database\Factories;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

//Factory para crear alumnos a la hora del desarrollo

class AlumnoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alumno::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    //Factory para crear varios alumnos para el desarrollo
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,

            'apellidos'=> $this->faker->name,

            'curso' => "2018-2019",

            'ciclo' => "Auxiliar de enfermeria",

            'email' => $this->faker->unique()->safeEmail,

            'telefono' => '785478845',

            'autorizacion' => 1

        ];
    }
}
