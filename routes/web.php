<?php

use App\Http\Controllers\alumnosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Rutas de la aplicacion 

//Ruta del mostrado sin formulario (Ivan)
Route::get('/', [alumnosController::class, 'getMostrado']);

//Ruta del mostrado pero con formulario para los profesores
Route::get('/check', [alumnosController::class, 'getMostradoForm']);

//Ruta del put para la actualizacion
Route::put('/check/{id}',[alumnosController::class, 'actualizarAutorizacion']);

//Ruta para la creacion de un alumno individualmente
Route::get('/crear', function(){
    return view('alumnos/creacion');
});