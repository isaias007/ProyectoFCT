<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Modelo del Alumno
class Alumno extends Model
{
    use HasFactory;


    protected $fillable=[

        "nombre",
        "apellidos",
        "curso",
        "ciclo",
        "email",
        "telefono",
        "autorizacion"

    ];

}
