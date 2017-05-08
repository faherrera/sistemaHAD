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
use Input;


// use WithoutMiddleware
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
         if ($employee == null) {
             Session::flash('message','No existe el empleado al que quiere acceder.');

             return Redirect('/empleados');

         }
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

    public function getAll(){
        $employees = Employee::All();

        return $employees;
    }

    public function getEmployee($legajo){

        $employee = Employee::where('legajo', $legajo)->first();

        if ($employee == null) {
            return response()->json(
                [
                    "mensaje"=> "El empleado no existe."
                ]);
            }

        return $employee;
    }

    public function createEmployee(Request $request){


        $request = $request->getContent();  //Obtengo el objeto json
        $request = json_decode($request,TRUE);  //convierto en array
        $employee_json = $request;

        try {
            $employee = Employee::create($employee_json);
            $employee->save();
            $m_array = ["Mensaje"=> "Cargado correctamente"];
            return response()->json($m_array);

        } catch (Exception $e) {
            $m_array = ["Mensaje"=> "ERROR EN LA CARGA"];
            return response()->json($m_array);

        }



    }

    public function updateEmployee(Request $request,$legajo){

        if ($legajo == null) {
            $m_array = ["Mensaje"=> "Debe ingresar un identificador correctamente"];
            return response()->json($m_array);
        }



        $request = json_decode($request->getContent(),TRUE);
        $employee = Employee::where('legajo', $legajo)->first();


        if ($employee == null) {
            $m_array = ["Mensaje"=> "NO EXISTE EL EMPLEADO"];
            return response()->json($m_array);
        }

        try {
            $employee->fill($request);
            $employee->save();

            $m_array = ["Mensaje"=> "Modificado correctamente"];
            return response()->json($m_array);

        } catch (Exception $e) {
            $m_array = ["Mensaje"=> "Error en la edicion EL EMPLEADO"];
            return response()->json($m_array);
        }


    }

    public function deleteEmployee(Request $request,$legajo){
        // $request = json_decode($request->getContent(),TRUE);
        // $legajo = $request["legajo"];

        // return $legajo;
        $employee = Employee::where('legajo',$legajo)->first();

        if ($employee == null) {
            $m_array = ["Mensaje"=> "NO EXISTE EL EMPLEADO"];
            return response()->json($m_array);
        }

        try {
            $employee->delete();
            $m_array = ["Mensaje"=> "Empleado eliminado SATISFACTORIAMENTE"];
            return response()->json($m_array);


        } catch (Exception $e) {

            $m_array = ["Mensaje"=> "NO pudo ser eliminado"];
            return response()->json($m_array);

        }





    }
}
