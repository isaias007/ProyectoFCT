<?php

use App\Http\Controllers\alumnosController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\MyController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


//Autenticacion


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify' => 'true']);

// Rutas de la aplicacion 

Route::group(['middleware' => 'verified'], function () {

    //Ruta del mostrado sin formulario (Ivan)

    Route::get('/home', [alumnosController::class, 'getMostrado']);
    



    //Ruta del mostrado pero con formulario para los profesores
    Route::get('/check', [alumnosController::class, 'getMostradoForm'])->middleware(['password.confirm']);;

    //Ruta del put para la actualizacion
    Route::put('/check', [alumnosController::class, 'actualizarAutorizacion']);

    //Ruta para el formulario de creacion de un alumno individualmente
    Route::get('/crear', [alumnosController::class, 'getCreacion'])->middleware(['password.confirm']);;

    //Ruta para la creaciuon del alumno
    Route::post('/crear', [alumnosController::class, 'creacionIndividual']);

    //PDF
    Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);


    //Excel

    Route::get('importExportView', [MyController::class, 'importExportView']);

    Route::get('export', [MyController::class, 'export'])->name('export');

    Route::post('import', [MyController::class, 'import'])->name('import');
});
