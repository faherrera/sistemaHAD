<?php

namespace SistemaHAD\Http\Controllers;

use Illuminate\Http\Request;

use SistemaHAD\Http\Requests;
use SistemaHAD\Http\Requests\ShiftDetailRequest;
use SistemaHAD\Http\Controllers\Controller;
use Carbon\Carbon;
use SistemaHAD\Employee_Goal;
use SistemaHAD\Employee;
use SistemaHAD\Shift;
use SistemaHAD\Shift_Detail;
use Session;
use Redirect;
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

    public function generarTurnoCreate(ShiftDetailRequest $request){
        $meselegido = $request->meselegido;
        $idempleado = $request->idempleado;
        $idobjetivo = $request->idobjetivo;
        $diasGemerados = array();
        $shift_id;

        ///Configurando fecha mes inicio y finalizacion.
        $fechaSeleccionadaInicio = Carbon::createFromDate(Carbon::now()->year,$request->meselegido,01); //Inicio de mes seleccionado
        Carbon::setTestNow($fechaSeleccionadaInicio);   //Indico que desde ahora a la fecha la trataré como lo que tenga la var.
        $fechaSeleccionadaFinalizacion = new Carbon('last day of this month');  //Ultimo dia mes seleccionado


        //Sacar inicio y fin de mes.
            //Lunes
                $getFirstMonday = Carbon::parse('first monday of this month');
                $getLastMonday = Carbon::parse('last monday of this month');
                $getLastMonday->hour = 23;
            //Martes
                $getFirstTuesday = Carbon::parse('first tuesday of this month');
                $getLastTuesday = Carbon::parse('last tuesday of this month');
                $getLastTuesday->hour = 23;
            //Miercoles
                $getFirstWednesday = Carbon::parse('first wednesday of this month');
                $getLastWednesday = Carbon::parse('last wednesday of this month');
                $getLastWednesday->hour = 23;
            //Jueves
                $getFirstThursday = Carbon::parse('first thursday of this month');
                $getLastThursday = Carbon::parse('last thursday of this month');
                $getLastThursday->hour = 23;
            //VIernes
                $getFirstFriday = Carbon::parse('first friday of this month');
                $getLastFriday = Carbon::parse('last friday of this month');
                $getLastFriday->hour = 23;
            //Sabado
                $getFirstSaturday = Carbon::parse('first saturday of this month');
                $getLastSaturday = Carbon::parse('last saturday of this month');
                $getLastSaturday->hour = 23;
            //Domingo
                $getFirstSunday = Carbon::parse('first sunday of this month');
                $getLastSunday = Carbon::parse('last sunday of this month');
                $getLastSunday->hour = 23;

         if(helperController::verificarMes($meselegido,$idempleado,$idobjetivo)){  //Si true me tiene que crear un turno mensual


          //  Generar TURNO MENSUAL (SHIFT) para empleado y objetivo traiods de request.
              $shift = Shift::Create([
                  "employee_id"=>$request->idempleado,
                  "goal_id"=>$request->idobjetivo,
                  "month"=>$request->meselegido
              ]);

              $shift->save();
              $shift_id = $shift->id;   //Asigno el id del turno creado a la variable $shift_id

             ##LUNES
             if ($request->iniciolunes) {
                 $horasAsignadas = $request->asignadaslunes;

                 while ($getFirstMonday <= $getLastMonday) {


                      $getFirstMonday->hour  = substr($request->iniciolunes,0,2); //ASIGNO HORA
                      $getFirstMonday->minute = substr($request->iniciolunes,3,2); //ASIGNO MINUTS

                      $finalizacion = $getFirstMonday->copy(); //Copio los valores del primer dia para no modificarlos.

                     $detalleTurno = Shift_Detail::Create([
                         'inicio'=> $getFirstMonday,
                         'asistencia' => true,
                         'feriado'=>false,
                         'shift_id' => $shift_id,
                         "employee_id"=>$request->idempleado,
                         "goal_id"=>$request->idobjetivo
                     ]);

                     $finalizacion->hour($finalizacion->hour + $horasAsignadas); //Le agrego las horas asignadas a la finalizacion.

                     $detalleTurno->finalizacion = $finalizacion;   //Le asigno el valor al campo $finalizacion
                     $detalleTurno->save(); //Guardo la modificacion.

                    //  print "<br>";
                    // echo "------------ESTE ES UN DETALLE----------".$detalleTurno;
                    //  print "<br>";

                    $getFirstMonday->day = $getFirstMonday->day+7;  //!IMPORANTE : Aqui estoy sumando los dias a la iteracion.
                 }



             }


            #Martes
             if ($request->iniciomartes) {
                 $horasAsignadas = $request->asignadasmartes;

                 while ($getFirstTuesday <= $getLastTuesday) {


                      $getFirstTuesday->hour  = substr($request->iniciomartes,0,2); //ASIGNO HORA
                      $getFirstTuesday->minute = substr($request->iniciomartes,3,2); //ASIGNO MINUTS

                      $finalizacion = $getFirstTuesday->copy(); //Copio los valores del primer dia para no modificarlos.

                     $detalleTurno = Shift_Detail::Create([
                         'inicio'=> $getFirstTuesday,
                         'asistencia' => true,
                         'feriado'=>false,
                         'shift_id' => $shift_id,
                         "employee_id"=>$request->idempleado,
                         "goal_id"=>$request->idobjetivo
                     ]);

                     $finalizacion->hour($finalizacion->hour + $horasAsignadas); //Le agrego las horas asignadas a la finalizacion.

                     $detalleTurno->finalizacion = $finalizacion;   //Le asigno el valor al campo $finalizacion
                     $detalleTurno->save(); //Guardo la modificacion.

                    //  print "<br>";
                    // echo "------------ESTE ES UN DETALLE----------".$detalleTurno;
                    //  print "<br>";

                    $getFirstTuesday->day = $getFirstTuesday->day+7;  //!IMPORANTE : Aqui estoy sumando los dias a la iteracion.
                 }




             }

            ##MIERCOLES
             if ($request->iniciomiercoles) {
                 $horasAsignadas = $request->asignadasmiercoles;

                 while ($getFirstWednesday <= $getLastWednesday) {


                      $getFirstWednesday->hour  = substr($request->iniciomiercoles,0,2); //ASIGNO HORA
                      $getFirstWednesday->minute = substr($request->iniciomiercoles,3,2); //ASIGNO MINUTS

                      $finalizacion = $getFirstWednesday->copy(); //Copio los valores del primer dia para no modificarlos.

                     $detalleTurno = Shift_Detail::Create([
                         'inicio'=> $getFirstWednesday,
                         'asistencia' => true,
                         'feriado'=>false,
                         'shift_id' => $shift_id,
                         "employee_id"=>$request->idempleado,
                         "goal_id"=>$request->idobjetivo
                     ]);

                     $finalizacion->hour($finalizacion->hour + $horasAsignadas); //Le agrego las horas asignadas a la finalizacion.

                     $detalleTurno->finalizacion = $finalizacion;   //Le asigno el valor al campo $finalizacion
                     $detalleTurno->save(); //Guardo la modificacion.

                    //  print "<br>";
                    // echo "------------ESTE ES UN DETALLE----------".$detalleTurno;
                    //  print "<br>";

                    $getFirstWednesday->day = $getFirstWednesday->day+7;  //!IMPORANTE : Aqui estoy sumando los dias a la iteracion.
                 }



             }
            ##JUEVES
             if ($request->iniciojueves) {
                 $horasAsignadas = $request->asignadasjueves;

                 while ($getFirstThursday <= $getLastThursday) {


                      $getFirstThursday->hour  = substr($request->iniciojueves,0,2); //ASIGNO HORA
                      $getFirstThursday->minute = substr($request->iniciojueves,3,2); //ASIGNO MINUTS

                      $finalizacion = $getFirstThursday->copy(); //Copio los valores del primer dia para no modificarlos.

                     $detalleTurno = Shift_Detail::Create([
                         'inicio'=> $getFirstThursday,
                         'asistencia' => true,
                         'feriado'=>false,
                         'shift_id' => $shift_id,
                         "employee_id"=>$request->idempleado,
                         "goal_id"=>$request->idobjetivo
                     ]);

                     $finalizacion->hour($finalizacion->hour + $horasAsignadas); //Le agrego las horas asignadas a la finalizacion.

                     $detalleTurno->finalizacion = $finalizacion;   //Le asigno el valor al campo $finalizacion
                     $detalleTurno->save(); //Guardo la modificacion.

                    //  print "<br>";
                    // echo "------------ESTE ES UN DETALLE----------".$detalleTurno;
                    //  print "<br>";

                    $getFirstThursday->day = $getFirstThursday->day+7;  //!IMPORANTE : Aqui estoy sumando los dias a la iteracion.
                 }
             }
            ##Viernes
             if ($request->inicioviernes) {
                 $horasAsignadas = $request->asignadasviernes;

                 while ($getFirstFriday <= $getLastFriday) {


                      $getFirstFriday->hour  = substr($request->inicioviernes,0,2); //ASIGNO HORA
                      $getFirstFriday->minute = substr($request->inicioviernes,3,2); //ASIGNO MINUTS

                      $finalizacion = $getFirstFriday->copy(); //Copio los valores del primer dia para no modificarlos.

                     $detalleTurno = Shift_Detail::Create([
                         'inicio'=> $getFirstFriday,
                         'asistencia' => true,
                         'feriado'=>false,
                         'shift_id' => $shift_id,
                         "employee_id"=>$request->idempleado,
                         "goal_id"=>$request->idobjetivo
                     ]);

                     $finalizacion->hour($finalizacion->hour + $horasAsignadas); //Le agrego las horas asignadas a la finalizacion.

                     $detalleTurno->finalizacion = $finalizacion;   //Le asigno el valor al campo $finalizacion
                     $detalleTurno->save(); //Guardo la modificacion.

                    //  print "<br>";
                    // echo "------------ESTE ES UN DETALLE----------".$detalleTurno;
                    //  print "<br>";

                    $getFirstFriday->day = $getFirstFriday->day+7;  //!IMPORANTE : Aqui estoy sumando los dias a la iteracion.
                 }

             }
            ##Sabado
             if ($request->iniciosabado) {
                 $horasAsignadas = $request->asignadassabado;

                 while ($getFirstSaturday <= $getLastSaturday) {


                      $getFirstSaturday->hour  = substr($request->iniciosabado,0,2); //ASIGNO HORA
                      $getFirstSaturday->minute = substr($request->iniciosabado,3,2); //ASIGNO MINUTS

                      $finalizacion = $getFirstSaturday->copy(); //Copio los valores del primer dia para no modificarlos.

                     $detalleTurno = Shift_Detail::Create([
                         'inicio'=> $getFirstSaturday,
                         'asistencia' => true,
                         'feriado'=>false,
                         'shift_id' => $shift_id,
                         "employee_id"=>$request->idempleado,
                         "goal_id"=>$request->idobjetivo
                     ]);

                     $finalizacion->hour($finalizacion->hour + $horasAsignadas); //Le agrego las horas asignadas a la finalizacion.

                     $detalleTurno->finalizacion = $finalizacion;   //Le asigno el valor al campo $finalizacion
                     $detalleTurno->save(); //Guardo la modificacion.

                    //  print "<br>";
                    // echo "------------ESTE ES UN DETALLE----------".$detalleTurno;
                    //  print "<br>";

                    $getFirstSaturday->day = $getFirstSaturday->day+7;  //!IMPORANTE : Aqui estoy sumando los dias a la iteracion.
                 }

             }
            ##Domingo
             if ($request->iniciodomingo) {
                 $horasAsignadas = $request->asignadasdomingo;

                 while ($getFirstSunday <= $getLastSunday) {


                      $getFirstSunday->hour  = substr($request->iniciodomingo,0,2); //ASIGNO HORA
                      $getFirstSunday->minute = substr($request->iniciodomingo,3,2); //ASIGNO MINUTS

                      $finalizacion = $getFirstSunday->copy(); //Copio los valores del primer dia para no modificarlos.

                     $detalleTurno = Shift_Detail::Create([
                         'inicio'=> $getFirstSunday,
                         'asistencia' => true,
                         'feriado'=>false,
                         'shift_id' => $shift_id,
                         "employee_id"=>$request->idempleado,
                         "goal_id"=>$request->idobjetivo
                     ]);

                     $finalizacion->hour($finalizacion->hour + $horasAsignadas); //Le agrego las horas asignadas a la finalizacion.

                     $detalleTurno->finalizacion = $finalizacion;   //Le asigno el valor al campo $finalizacion
                     $detalleTurno->save(); //Guardo la modificacion.

                    //  print "<br>";
                    // echo "------------ESTE ES UN DETALLE----------".$detalleTurno;
                    //  print "<br>";

                    $getFirstSunday->day = $getFirstSunday->day+7;  //!IMPORANTE : Aqui estoy sumando los dias a la iteracion.
                 }
             }


             Session::flash('message','Generado turnos de los dias  lunes para el mes');
             return Redirect::to('/generarturno');


         }else{

             return "generacion para el mes de ".$meselegido." ya existe"; //SI el turno ya existe para el empleado deberia llegar aqui.
         }



    }





}
