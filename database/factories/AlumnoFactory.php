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
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,

            'apellidos'=> $this->faker->name,

            'curso' => "Desarrolo de Aplicaciones Web",

            'email' => $this->faker->unique()->safeEmail,

            'telefono' => '692054063',

            'autorizacion' => 0

        ];
    }
}
