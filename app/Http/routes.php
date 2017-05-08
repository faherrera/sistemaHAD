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

//Logueo.
Route::resource('log','LogController');
Route::resource('users','UserController');

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

/*
API DE EMPLEADOS.
*/

//GET
Route::get('api/empleados','EmployeeController@getAll');    //Todos los empleados
Route::get('api/empleados/{legajo}','EmployeeController@getEmployee'); //Buscar Empleado.

//POST
Route::post('api/empleados','EmployeeController@createEmployee');   //Crear un empleado

//PUT
Route::put('api/empleados/{legajo}','EmployeeController@updateEmployee'); //Editar un empleado

//DELETE
Route::delete('api/empleados/{legajo}','EmployeeController@deleteEmployee'); //Editar un empleado
