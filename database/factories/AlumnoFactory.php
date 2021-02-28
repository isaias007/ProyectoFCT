<?php

namespace Database\Factories;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

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

            'curso' => "2020-2021",

            'ciclo' => "Comercio y Marketing",

            'email' => $this->faker->unique()->safeEmail,

            'telefono' => '785478845',

            'autorizacion' => 1

        ];
    }
}
