<?php

namespace SistemaHAD\Http\Controllers;

use Illuminate\Http\Request;

use SistemaHAD\Http\Requests;
use SistemaHAD\Http\Controllers\Controller;
use SistemaHAD\Employee;
use SistemaHAD\Goal;
use SistemaHAD\Employee_Goal;
use SistemaHAD\Shift_Detail;
use Session;
use Redirect;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::All();

        return view('Employee.listado',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Employee.Create');

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
        $employee = Employee::create($request->all());
        $employee->save();

        Session::flash('message','Empleado correctamente cargado.');
        return Redirect('/empleados');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $employee = Employee::find($id);
         $getGoal = Employee_Goal::where('employee_id',$id)->get();
         $getDetailShifts = Shift_Detail::where('employee_id',$id)->get();
        // $relacion = Employee_Goal::select('goal_id')->where('employee_id','=',$id)->get();
        // $goal = Goal::find($relacion);
        // $goal_employees = Employee_Goal::getEmployee($id)->get();

        return view('Employee.Show',compact('employee','getGoal','getDetailShifts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('Employee.Edit',compact('employee'));

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
        $employee = Employee::find($id);
        $employee->fill($request->all());
        $employee->save();
        // return $request->all();
        Session::flash('message','Empleado Editado correctamente.');
        return Redirect('/empleados');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);

        $employee->delete();

        Session::flash('message','Empleado Borrado correctamente.');
        return Redirect('/empleados');

    }
}
