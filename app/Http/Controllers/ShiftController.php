<?php

namespace SistemaHAD\Http\Controllers;

use Illuminate\Http\Request;

use SistemaHAD\Http\Requests;
use SistemaHAD\Http\Controllers\Controller;
use Carbon\Carbon;
use SistemaHAD\Employee_Goal;
use SistemaHAD\Employee;
class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Carbon::setLocale('es');
        $currentDate = Carbon::now();

        $employee_goals = Employee_Goal::all();
        //Traduciendo el Mes
        switch ($currentDate->month) {
            case 1:
                $mes = "Enero";
                break;

            case 2:
                $mes = "Febrero";
                break;

            case 11:
                $mes = "Noviembre";
                break;
            case 12:
                $mes = "Diciembre";
                break;

            default:
                # code...
                break;
        }
        //Traduciendo el Mes

        return view('Shift.index',compact('currentDate','mes','employee_goals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Shift.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function generarTurno($id){

        $employee_goal = Employee_Goal::find($id);
        return view('Shift.Generar.Create',compact('employee_goal'));
        // return "string";
        // return "El id del empleado es ".$id;
    }

    public function generarTurnoCreate(Request $request){
        return $request->all();

    }
}
