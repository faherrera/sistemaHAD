<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('Front.index');
});


Route::resource('empleados','EmployeeController');

Route::resource('objetivos','GoalController');

//Relacion
Route::resource('relacionEG','Employee_GoalController',['except'=>['index']]);

// Turnos y generaciones automaticas

    Route::resource('turnos','ShiftController');    // HTTP turnos

    Route::get('generarturno/{id}','ShiftController@generarTurno');
    Route::get('generarturno','ShiftController@index');
    Route::post('generarturno','ShiftController@generarTurnoCreate');

    // Route::get('turnos/generarturno/{$id}','ShiftController@generarTurno'); //Generacion Automatica segun ID
