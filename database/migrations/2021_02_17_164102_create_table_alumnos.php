<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//Migracion de la tabla de alumnos y principal
class CreateTableAlumnos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre", 100);
            $table->string("apellidos", 100);
            $table->string("curso");
            $table->string("ciclo");
            $table->string("email")->unique();
            $table->string("telefono", 12);
            $table->boolean("autorizacion");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
