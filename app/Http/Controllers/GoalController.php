<?php

namespace SistemaHAD\Http\Controllers;

use Illuminate\Http\Request;

use SistemaHAD\Http\Requests;
use SistemaHAD\Http\Requests\GoalRequest;
use SistemaHAD\Http\Controllers\Controller;
use Session;
use Redirect;
use SistemaHAD\Goal;
use SistemaHAD\Employee_Goal;
use SistemaHAD\Shift_Detail;
class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goals = Goal::all();
        return view('Goal.index',compact('goals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Goal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoalRequest $request)
    {

        if (empty($request->path)) {
            return "Está vacio.";
        }

        $goal = Goal::Create($request->all());
        $goal->save();


        Session::flash('message','Objetivo creado correctamente');
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
        $goal = Goal::find($id);
        $getEmployees = Employee_Goal::where('goal_id', $id)->get();
        $getDetailShifts = Shift_Detail::where('goal_id',$id)->get();

        return view('Goal.show',compact('goal','getEmployees','getDetailShifts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $goal = Goal::find($id);
        return view('Goal.Edit',compact('goal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoalRequest $request, $id)
    {
        $goal = Goal::find($id);
        $goal->fill($request->all());
        $goal->save();
        // return $request->all();
        Session::flash('message','Objetivo Editado correctamente.');
        return Redirect('/objetivos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $goal = Goal::find($id);

        $goal->delete();

        Session::flash('message-danger','Objetivo Borrado correctamente.');
        return Redirect('/objetivos');    }
}
