<?php

use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\CSVController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

//Autenticacion (Login)

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify' => 'true']);

// Rutas de la aplicacion 

Route::group(['middleware' => 'verified'], function () {

    //Ruta para el home despues del login
    Route::get('/home', [AlumnosController::class, 'getHome']);

    //Ruta del mostrado sin formulario (Ivan)
    Route::get('/gestion', [AlumnosController::class, 'getMostrado']);

    //Ruta del mostrado pero con formulario para los profesores
    Route::get('/check', [AlumnosController::class, 'getMostradoForm'])->middleware(['password.confirm']);;

    //Ruta del put para la actualizacion
    Route::put('/check', [AlumnosController::class, 'actualizarAutorizacion']);

    //Ruta para el formulario de creacion de un alumno individualmente
    Route::get('/crear', [AlumnosController::class, 'getCreacion'])->middleware(['password.confirm']);;

    //Ruta para la creaciuon del alumno
    Route::post('/crear', [AlumnosController::class, 'creacionIndividual']);

    //PDF
    Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);

    //Excel
    Route::get('importExportView', [CSVController::class, 'importExportView']);
    Route::get('export', [CSVController::class, 'export'])->name('export');
    Route::post('import', [CSVController::class, 'import'])->name('import');
});




//Rutas para el crud de roles y usuarios
Route::group(['middleware' => ['auth']], function () {

    Route::resource('roles', RoleController::class);

    Route::resource('users', UserController::class);
});
