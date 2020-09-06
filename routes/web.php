<?php

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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::resources([
    'candidatos' => 'CandidatosController',
    'capacitaciones' => 'CapacitacionesController',
    'competencias' => 'CompetenciasController',
    'experiencia' => 'ExperienciaLaboralController',
    'idiomas' => 'IdiomasController',
    'puestos' => 'PuestosController',
    'departamentos' => 'DepartamentosController',
    'cniveles' => 'NivelesCapacitacionesController',
    'empleados' => 'EmpleadosController',
]);

Route::get('/empleados/create/candidate/{candidatoId}', 'EmpleadosController@createFromCandidate')
    ->name('empleados.create.candidate');
