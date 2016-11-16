<?php

namespace SistemaHAD\Http\Controllers;

use Illuminate\Http\Request;

use SistemaHAD\Http\Requests;
use SistemaHAD\Http\Controllers\Controller;
use SistemaHAD\Employee_Goal;
use SistemaHAD\Goal;
use SistemaHAD\Employee;
use DB;
use Session;
use Redirect;
class Employee_GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::select(
                    DB::raw("CONCAT(employees.nombre,' ',employees.apellido) AS full_name , id")
                    )->lists('full_name','id');
        $goals = Goal::lists('direccion','id');

        return view('Employee_Goal.Create',compact('employees','goals'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        $employee_goal = Employee_Goal::Create($request->all());
        $employee_goal->save();

        Session::flash('message','Creada la relacion entre Empleado/Objetivo');
        return Redirect::to('/objetivos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
