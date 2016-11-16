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
use SistemaHAD\Goal;
use SistemaHAD\Shift_Detail;
use Session;
use Redirect;
use DB;
class ShiftController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $primerDiaDelMes = Carbon::parse('first day of this month');
        $ultimoDiaDelMes = Carbon::parse('last day of this month');
        Carbon::setLocale('es');
        $currentDate = Carbon::now();

        $employee_goals = Employee_Goal::all();
        $shift_details = Shift_Detail::all();

        $empleadosTurnosEsteMes = Shift::Where('month','=',$primerDiaDelMes->month)->get();
        return view('Shift.index',compact('currentDate','mes','employee_goals','empleadosTurnosEsteMes'));
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
        $goals = Goal::all()->pluck('direccion','id');
        return view('Shift.create',compact('employees','goals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dateInicio = new Carbon($request->inicio);
        $meselegido = $dateInicio->month;
        $idempleado = $request->employee_id;
        $idobjetivo = $request->goal_id;
        $shift_id;
        if(helperController::verificarMes($meselegido,$idempleado,$idobjetivo)){  //Si true me tiene que crear un turno mensual


         //  Generar TURNO MENSUAL (SHIFT) para empleado y objetivo traiods de request.
             $shift = Shift::Create([
                 "employee_id"=>$idempleado,
                 "goal_id"=>$idobjetivo,
                 "month"=>$meselegido
             ]);

             $shift->save();
             $shift_id = $shift->id;   //Asigno el id del turno creado a la variable $shift_id

        }
        else{

             $resultadoConsulta = Shift::where('month',$meselegido)->where('employee_id', $idempleado)->where('goal_id', $idobjetivo)->get();
               foreach ($resultadoConsulta as $resultado) {
                   $shift_id = $resultado->id;
                }
        }
        echo "id de turno existente -> ".$shift_id;
        print "<br>";
        echo "id del empleado -> ".$request->employee_id;
        print "<br>";
        echo "id del objetivo -> ".$request->goal_id;
        print "<br>";

        echo $dateInicio;
        print "<br>";
        echo "------fechas----";
        print "<br>";
        echo "Dia ->  ".$dateInicio->day;
        print "<br>";
        echo "Mes ->  ".$dateInicio->month;
        print "<br>";
        echo "Año ->  ".$dateInicio->year;
        print "<br>";
        echo "HOra ->  ".$dateInicio->hour;
        print "<br>";
        echo "MInuto -> ".$dateInicio->minute;
        print "<br>";
        $dateFinalizacion = $dateInicio->copy();
        $dateFinalizacion->addHours($request->horasAsignadas);
        echo "Fecha finalizacion -> ".$dateFinalizacion;
        print "<br>";

        $turno = Shift_Detail::Create([
            'inicio'=> $dateInicio,
            'finalizacion' => $dateFinalizacion,
            'asistencia' => 1,
            'feriado' => $request->feriado,
            'shift_id' => $shift_id,
            'employee_id'=>$idempleado,
            'goal_id' => $idobjetivo
        ]);
        Session::flash('message','Turno creado correctamente');
        return Redirect::to('/empleados/'.$idempleado);

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
        $shift = Shift_Detail::find($id);
        $inicio = new Carbon($shift->inicio);
        $finalizacion = new Carbon($shift->finalizacion);
        $diferenciaEnHoras = $inicio->diffInHours($finalizacion);
        return view('Shift.Edit',compact('shift','diferenciaEnHoras'));
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
        $idempleado = $request->employee_id;

        $inicio = new Carbon($request->inicio);
        $finalizacion = $inicio->copy();

        $shift = Shift_Detail::find($id);
        $shift->inicio = new Carbon($request->inicio);
        $shift->finalizacion = $finalizacion->addHours($request->horasAsignadas);
        $shift->asistencia = $request->asistencia;
        $shift->feriado = $request->feriado;
        $shift->employee_id = $request->employee_id;
        $shift->goal_id = $request->goal_id;
        $shift->shift_id = $request->shift_id;

        $shift->save();

        Session::flash('message','Turno editado correctamente');
        return Redirect::to('/empleados/'.$idempleado);
        // return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shift = Shift_Detail::find($id);
        $idempleado = $shift->employee_id; //Identifico el empleado para redireccionar
        $shift->delete();

        Session::flash('message-danger','Turno Borrado correctamente.');
        return Redirect('/empleados/'.$idempleado);
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
            }else{

                 $resultadoConsulta = Shift::where('month',$meselegido)->where('employee_id', $idempleado)->where('goal_id', $idobjetivo)->get();
                foreach ($resultadoConsulta as $resultado) {
                    $shift_id = $resultado->id;
                }
         }

    //  ///// Generacion
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

            array_push($diasGemerados,"Lunes"); //Agrego un dia

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

            array_push($diasGemerados,"Martes"); //Agrego un dia



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

            array_push($diasGemerados,"Miercoles"); //Agrego un dia


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
            array_push($diasGemerados,"Jueves"); //Agrego un dia

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
            array_push($diasGemerados,"Viernes"); //Agrego un dia


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
            array_push($diasGemerados,"Sabado"); //Agrego un dia


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
            array_push($diasGemerados,"Domingo"); //Agrego un dia

        }

        $diasGeneradosString = implode(",",$diasGemerados);
        Session::flash('message-turnosGenerados','Generado turnos para'.$diasGeneradosString.' para el mes seleccionado');
        return Redirect::to('/empleados/'.$idempleado);





    }
    //FIn metodo para generarTUrno Autimaticamente.






}
