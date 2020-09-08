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

Auth::routes();

Route::redirect('/', '/puestos');

Route::get('/puestos/me', 'PuestosController@myPositions')
    ->name('puestos.my');

Route::resources([
    'candidatos' => 'CandidatosController',
    'capacitaciones' => 'CapacitacionesController',
    'competencias' => 'CompetenciasController',
    'idiomas' => 'IdiomasController',
    'puestos' => 'PuestosController',
    'departamentos' => 'DepartamentosController',
    'cniveles' => 'NivelesCapacitacionesController',
    'empleados' => 'EmpleadosController',
]);

Route::get('/empleados/create/candidate/{candidatoId}', 'EmpleadosController@createFromCandidate')
    ->name('empleados.create.candidate');

Route::get('/candidates/{id}/experience', 'CandidatosController@addExperience')
    ->name('candidates.experience.add');

Route::post('/candidates/{id}/experience', 'CandidatosController@storeExperience')
    ->name('candidates.experience.store');

Route::delete('/candidates/{id}/experience/{experienceId}', 'CandidatosController@removeExperience')
    ->name('candidates.experience.remove');

Route::get('/candidates/{id}/experience/{experienceId}', 'CandidatosController@editExperience')
    ->name('candidates.experience.edit');

Route::put('/candidates/{id}/experience/{experienceId}', 'CandidatosController@updateExperience')
    ->name('candidates.experience.update');

Route::get('/candidates/{id}/puesto/{puestoId}', 'CandidatosController@aplicarPuesto')
    ->name('candidates.position.apply');

Route::get('/candidates/{id}/puesto/{puestoId}/remover', 'CandidatosController@removerPuesto')
    ->name('candidates.position.remove');

