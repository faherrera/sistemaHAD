@extends('layouts.admin')
    @section('content')
    <!--  Section Content Yield-->
        <section class="content">

            <section class="box-objetivo-detalle__container">

                <div class="jumbotron">
                    <div class="container">
                        <!--  EMpleado-->
                        <div class="col-sm-12 col-md-6 box-objetivo">
                            <div class="panel panel-default">
                                <h3>Para Empleado:</h3>
                            </div>
                            <div class="thumbnail">

                                <div class="caption">
                                    <h3 style="text-transform: uppercase;">{{$employee_goal->employee->nombre}} {{$employee_goal->employee->apellido}}</h3>

                                    <p>
                                        {!! link_to_route('empleados.show', $title = "Ver empleado", $parameters = $employee_goal->employee->id, $attributes=['class'=>'btn btn-success'])!!}

                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--  EMpleado-->
                        <!--  Obejtivo-->
                        <div class="col-sm-12 col-md-6 box-objetivo">
                            <div class="panel panel-default">
                                <h3>Para Objetivo:</h3>
                            </div>
                            <div class="thumbnail">
                                <div class="caption">
                                    <h3 style="text-transform: uppercase;">{{$employee_goal->goal->nombre}}</h3>
                                    <h3 style="text-transform: uppercase;">Direccion{{$employee_goal->goal->direccion}}</h3>

                                    <p>
                                        {!! link_to_route('empleados.show', $title = "Ver empleado", $parameters = $employee_goal->goal->id, $attributes=['class'=>'btn btn-success'])!!}

                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--  Obejtivo-->
                    </div>
                </div>

                <!--  Generacion Turnos -->
                <div class="box-detalle__item--informacion col-sm-12 col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Generacion automatica</h3>
                        </div>
                        {!!Form::open(['action'=>'ShiftController@generarTurnoCreate','method'=>'POST'])!!}
                        {{-- SELECCIONAR MES --}}
                            {!!Form::label('Selecciona el mes.',null,['class'=>'form-control label label-success'])!!}
                            <div class="panel-body">
                                <select class="form-control" name="meselegido">
                                    <option value="january">Enero</option>
                                    <option value="february">Febrero</option>
                                    <option value="march">Marzo</option>
                                    <option value="april">Abril</option>
                                    <option value="may">Mayo</option>
                                    <option value="june">Junio</option>
                                    <option value="july">Julio</option>
                                    <option value="august">Agosto</option>
                                    <option value="september">Septiembre</option>
                                    <option value="october">Octubre</option>
                                    <option value="noviembre">Noviembre</option>
                                    <option value="december">Diciembre</option>
                                </select>

                            </div>
                        {{-- SELECCIONAR MES --}}

                        {{-- BODY --}}
                        <div class="panel-body">
                            {{-- GENERACION SEMANAL --}}

                            {{-- GENERACION DIA LUNES --}}
                            <div class="panel panel-info" id="lunes" style="text-align:center">
                                    <div class="panel-heading">Generacion para los dias: Lunes</div>
                                    <div class="panel-body">
                                        <div class="panel panel-default ">
                                            <div class="panel-body">
                                                    {{-- Preguntar si trabajará--}}
                                                    <h3>
                                                        {!! Form::label('¿Trabajará los dias Lunes?',null,['class'=>'label label-primary']) !!}

                                                    </h3>

                                                    <div class="form-group">
                                                        <button type="button" name="silunes" id="silunes" class="btn btn-success"> SI</button>
                                                        <button type="button" name="nolunes" id="nolunes" class="btn btn-danger"> NO</button>

                                                    </div>
                                                    {{-- Preguntar si trabajará--}}

                                                    {{-- Box para activar *--}}
                                                    <div id="boxlunes" style="display:none">
                                                        {{-- Desde --}}
                                                            {!! Form::label('Horario Inicio',null,['class'=>'label label-primary']) !!}

                                                            {{-- HORARIO --}}
                                                                <div class='input-group date' id='dtplunes'>
                                                                   <input type='text' class="form-control" name="iniciolunes" id="horarioinicio"/>
                                                                   <span class="input-group-addon">
                                                                       <span class="glyphicon glyphicon-time"></span>
                                                                   </span>
                                                               </div>
                                                            {{-- HORARIO --}}
                                                        {{-- Desde --}}

                                                        {{-- Hasta --}}
                                                            {!! Form::label('Horas asignadas de trabajo',null,['class'=>'label label-primary']) !!}
                                                            {!! Form::number('asignadaslunes',null,['class'=>'form-control','min'=>'6','max'=>'12','patterns'=>'{0-9}']) !!}
                                                        {{-- Hasta --}}

                                                        {{-- Jornada --}}
                                                            {!! Form::label('Tipo Jornada',null,['class'=>'label label-primary']) !!}

                                                            {{-- jornadas --}}
                                                                <select class="form-control" name="">
                                                                    <option value="option">Matutino</option>
                                                                    <option value="option">Vespertino</option>
                                                                    <option value="option">Diurno</option>
                                                                </select>
                                                            {{-- jornadas --}}
                                                        {{-- Jornada --}}
                                                    </div>
                                                    {{-- Box para activar *--}}


                                            </div>

                                        </div>
                                    </div>
                            </div>
                            {{-- GENERACION DIA LUNES --}}

                            {{-- GENERACION DIA MARTES --}}
                            <div class="panel panel-info" id="martes" style="text-align:center">
                                    <div class="panel-heading">Generacion para los dias: Martes</div>
                                    <div class="panel-body">
                                        <div class="panel panel-default ">
                                            <div class="panel-body">
                                                    {{-- Preguntar si trabajará--}}
                                                    <h3>
                                                        {!! Form::label('¿Trabajará los dias Martes?',null,['class'=>'label label-primary']) !!}

                                                    </h3>

                                                    <div class="form-group">
                                                        <button type="button" name="simartes" id="simartes" class="btn btn-success"> SI</button>
                                                        <button type="button" name="simartes" id="nomartes" class="btn btn-danger"> NO</button>

                                                    </div>
                                                    {{-- Preguntar si trabajará--}}

                                                    {{-- Box para activar *--}}
                                                    <div id="boxmartes" style="display:none">
                                                        {{-- Desde --}}
                                                            {!! Form::label('Horario Inicio',null,['class'=>'label label-primary']) !!}

                                                            {{-- HORARIO --}}
                                                                <div class='input-group date' id='dtpmartes'>
                                                                   <input type='text' class="form-control" name="iniciomartes" id="horarioinicio"/>
                                                                   <span class="input-group-addon">
                                                                       <span class="glyphicon glyphicon-time"></span>
                                                                   </span>
                                                               </div>
                                                            {{-- HORARIO --}}
                                                        {{-- Desde --}}

                                                        {{-- Hasta --}}
                                                            {!! Form::label('Horas asignadas de trabajo',null,['class'=>'label label-primary']) !!}
                                                            {!! Form::number('asignadasmartes',null,['class'=>'form-control','min'=>'6','max'=>'12','patterns'=>'{0-9}']) !!}
                                                        {{-- Hasta --}}

                                                        {{-- Jornada --}}
                                                            {!! Form::label('Tipo Jornada',null,['class'=>'label label-primary']) !!}

                                                            {{-- jornadas --}}
                                                                <select class="form-control" name="">
                                                                    <option value="option">Matutino</option>
                                                                    <option value="option">Vespertino</option>
                                                                    <option value="option">Diurno</option>
                                                                </select>
                                                            {{-- jornadas --}}
                                                        {{-- Jornada --}}
                                                    </div>
                                                    {{-- Box para activar *--}}


                                            </div>

                                        </div>
                                    </div>
                            </div>
                            {{-- GENERACION DIA MARTES --}}

                            {{-- GENERACION DIA Mie --}}
                            <div class="panel panel-info" id="miercoles" style="text-align:center">
                                    <div class="panel-heading">Generacion para los dias: Miercoles</div>
                                    <div class="panel-body">
                                        <div class="panel panel-default ">
                                            <div class="panel-body">
                                                    {{-- Preguntar si trabajará--}}
                                                    <h3>
                                                        {!! Form::label('¿Trabajará los dias Miercoles?',null,['class'=>'label label-primary']) !!}

                                                    </h3>

                                                    <div class="form-group">
                                                        <button type="button" name="simiercoles" id="simiercoles" class="btn btn-success"> SI</button>
                                                        <button type="button" name="simiercoles" id="nomiercoles" class="btn btn-danger"> NO</button>

                                                    </div>
                                                    {{-- Preguntar si trabajará--}}

                                                    {{-- Box para activar *--}}
                                                    <div id="boxmiercoles" style="display:none">
                                                        {{-- Desde --}}
                                                            {!! Form::label('Horario Inicio',null,['class'=>'label label-primary']) !!}

                                                            {{-- HORARIO --}}
                                                                <div class='input-group date' id='dtpmiercoles'>
                                                                   <input type='text' class="form-control" name="iniciomiercoles" id="horarioinicio"/>
                                                                   <span class="input-group-addon">
                                                                       <span class="glyphicon glyphicon-time"></span>
                                                                   </span>
                                                               </div>
                                                            {{-- HORARIO --}}
                                                        {{-- Desde --}}

                                                        {{-- Hasta --}}
                                                            {!! Form::label('Horas asignadas de trabajo',null,['class'=>'label label-primary']) !!}
                                                            {!! Form::number('asignadasmiercoles',null,['class'=>'form-control','min'=>'6','max'=>'12','patterns'=>'{0-9}']) !!}
                                                        {{-- Hasta --}}

                                                        {{-- Jornada --}}
                                                            {!! Form::label('Tipo Jornada',null,['class'=>'label label-primary']) !!}

                                                            {{-- jornadas --}}
                                                                <select class="form-control" name="">
                                                                    <option value="option">Matutino</option>
                                                                    <option value="option">Vespertino</option>
                                                                    <option value="option">Diurno</option>
                                                                </select>
                                                            {{-- jornadas --}}
                                                        {{-- Jornada --}}
                                                    </div>
                                                    {{-- Box para activar *--}}


                                            </div>

                                        </div>
                                    </div>
                            </div>
                            {{-- GENERACION DIA Mie --}}

                            {{-- GENERACION DIA Jueves --}}
                            <div class="panel panel-info" id="jueves" style="text-align:center">
                                    <div class="panel-heading">Generacion para los dias: Jueves</div>
                                    <div class="panel-body">
                                        <div class="panel panel-default ">
                                            <div class="panel-body">
                                                    {{-- Preguntar si trabajará--}}
                                                    <h3>
                                                        {!! Form::label('¿Trabajará los dias Jueves?',null,['class'=>'label label-primary']) !!}

                                                    </h3>

                                                    <div class="form-group">
                                                        <button type="button" name="sijueves" id="sijueves" class="btn btn-success"> SI</button>
                                                        <button type="button" name="sijueves" id="nojueves" class="btn btn-danger"> NO</button>

                                                    </div>
                                                    {{-- Preguntar si trabajará--}}

                                                    {{-- Box para activar *--}}
                                                    <div id="boxjueves" style="display:none">
                                                        {{-- Desde --}}
                                                            {!! Form::label('Horario Inicio',null,['class'=>'label label-primary']) !!}

                                                            {{-- HORARIO --}}
                                                                <div class='input-group date' id='dtpjueves'>
                                                                   <input type='text' class="form-control" name="iniciojueves" id="horarioinicio"/>
                                                                   <span class="input-group-addon">
                                                                       <span class="glyphicon glyphicon-time"></span>
                                                                   </span>
                                                               </div>
                                                            {{-- HORARIO --}}
                                                        {{-- Desde --}}

                                                        {{-- Hasta --}}
                                                            {!! Form::label('Horas asignadas de trabajo',null,['class'=>'label label-primary']) !!}
                                                            {!! Form::number('asignadasjueves',null,['class'=>'form-control','min'=>'6','max'=>'12','patterns'=>'{0-9}']) !!}
                                                        {{-- Hasta --}}

                                                        {{-- Jornada --}}
                                                            {!! Form::label('Tipo Jornada',null,['class'=>'label label-primary']) !!}

                                                            {{-- jornadas --}}
                                                                <select class="form-control" name="">
                                                                    <option value="option">Matutino</option>
                                                                    <option value="option">Vespertino</option>
                                                                    <option value="option">Diurno</option>
                                                                </select>
                                                            {{-- jornadas --}}
                                                        {{-- Jornada --}}
                                                    </div>
                                                    {{-- Box para activar *--}}


                                            </div>

                                        </div>
                                    </div>
                            </div>
                            {{-- GENERACION DIA Jueves --}}

                            {{-- GENERACION DIA Viernes --}}
                            <div class="panel panel-info" id="viernes" style="text-align:center">
                                    <div class="panel-heading">Generacion para los dias: Viernes</div>
                                    <div class="panel-body">
                                        <div class="panel panel-default ">
                                            <div class="panel-body">
                                                    {{-- Preguntar si trabajará--}}
                                                    <h3>
                                                        {!! Form::label('¿Trabajará los dias Viernes?',null,['class'=>'label label-primary']) !!}

                                                    </h3>

                                                    <div class="form-group">
                                                        <button type="button" name="siviernes" id="siviernes" class="btn btn-success"> SI</button>
                                                        <button type="button" name="siviernes" id="noviernes" class="btn btn-danger"> NO</button>

                                                    </div>
                                                    {{-- Preguntar si trabajará--}}

                                                    {{-- Box para activar *--}}
                                                    <div id="boxviernes" style="display:none">
                                                        {{-- Desde --}}
                                                            {!! Form::label('Horario Inicio',null,['class'=>'label label-primary']) !!}

                                                            {{-- HORARIO --}}
                                                                <div class='input-group date' id='dtpviernes'>
                                                                   <input type='text' class="form-control" name="inicioviernes" id="horarioinicio"/>
                                                                   <span class="input-group-addon">
                                                                       <span class="glyphicon glyphicon-time"></span>
                                                                   </span>
                                                               </div>
                                                            {{-- HORARIO --}}
                                                        {{-- Desde --}}

                                                        {{-- Hasta --}}
                                                            {!! Form::label('Horas asignadas de trabajo',null,['class'=>'label label-primary']) !!}
                                                            {!! Form::number('asignadasviernes',null,['class'=>'form-control','min'=>'6','max'=>'12','patterns'=>'{0-9}']) !!}
                                                        {{-- Hasta --}}

                                                        {{-- Jornada --}}
                                                            {!! Form::label('Tipo Jornada',null,['class'=>'label label-primary']) !!}

                                                            {{-- jornadas --}}
                                                                <select class="form-control" name="">
                                                                    <option value="option">Matutino</option>
                                                                    <option value="option">Vespertino</option>
                                                                    <option value="option">Diurno</option>
                                                                </select>
                                                            {{-- jornadas --}}
                                                        {{-- Jornada --}}
                                                    </div>
                                                    {{-- Box para activar *--}}


                                            </div>

                                        </div>
                                    </div>
                            </div>
                            {{-- GENERACION DIA Viernes --}}

                            {{-- GENERACION DIA Sabado --}}
                            <div class="panel panel-info" id="sabado" style="text-align:center">
                                    <div class="panel-heading">Generacion para los dias: Sabado</div>
                                    <div class="panel-body">
                                        <div class="panel panel-default ">
                                            <div class="panel-body">
                                                    {{-- Preguntar si trabajará--}}
                                                    <h3>
                                                        {!! Form::label('¿Trabajará los dias Sabado?',null,['class'=>'label label-primary']) !!}

                                                    </h3>

                                                    <div class="form-group">
                                                        <button type="button" name="sisabado" id="sisabado" class="btn btn-success"> SI</button>
                                                        <button type="button" name="sisabado" id="nosabado" class="btn btn-danger"> NO</button>

                                                    </div>
                                                    {{-- Preguntar si trabajará--}}

                                                    {{-- Box para activar *--}}
                                                    <div id="boxsabado" style="display:none">
                                                        {{-- Desde --}}
                                                            {!! Form::label('Horario Inicio',null,['class'=>'label label-primary']) !!}

                                                            {{-- HORARIO --}}
                                                                <div class='input-group date' id='dtpsabado'>
                                                                   <input type='text' class="form-control" name="iniciosabado" id="horarioinicio"/>
                                                                   <span class="input-group-addon">
                                                                       <span class="glyphicon glyphicon-time"></span>
                                                                   </span>
                                                               </div>
                                                            {{-- HORARIO --}}
                                                        {{-- Desde --}}

                                                        {{-- Hasta --}}
                                                            {!! Form::label('Horas asignadas de trabajo',null,['class'=>'label label-primary']) !!}
                                                            {!! Form::number('asignadassabado',null,['class'=>'form-control','min'=>'6','max'=>'12','patterns'=>'{0-9}']) !!}
                                                        {{-- Hasta --}}

                                                        {{-- Jornada --}}
                                                            {!! Form::label('Tipo Jornada',null,['class'=>'label label-primary']) !!}

                                                            {{-- jornadas --}}
                                                                <select class="form-control" name="">
                                                                    <option value="option">Matutino</option>
                                                                    <option value="option">Vespertino</option>
                                                                    <option value="option">Diurno</option>
                                                                </select>
                                                            {{-- jornadas --}}
                                                        {{-- Jornada --}}
                                                    </div>
                                                    {{-- Box para activar *--}}


                                            </div>

                                        </div>
                                    </div>
                            </div>
                            {{-- GENERACION DIA Sabado --}}

                            {{-- GENERACION DIA DOmingo --}}
                            <div class="panel panel-info" id="domingo" style="text-align:center">
                                    <div class="panel-heading">Generacion para los dias: Domingos</div>
                                    <div class="panel-body">
                                        <div class="panel panel-default ">
                                            <div class="panel-body">
                                                    {{-- Preguntar si trabajará--}}
                                                    <h3>
                                                        {!! Form::label('¿Trabajará los dias Domingo?',null,['class'=>'label label-primary']) !!}

                                                    </h3>

                                                    <div class="form-group">
                                                        <button type="button" name="sidomingo" id="sidomingo" class="btn btn-success"> SI</button>
                                                        <button type="button" name="sidomingo" id="nodomingo" class="btn btn-danger"> NO</button>

                                                    </div>
                                                    {{-- Preguntar si trabajará--}}

                                                    {{-- Box para activar *--}}
                                                    <div id="boxdomingo" style="display:none">
                                                        {{-- Desde --}}
                                                            {!! Form::label('Horario Inicio',null,['class'=>'label label-primary']) !!}

                                                            {{-- HORARIO --}}
                                                                <div class='input-group date' id='dtpdomingo'>
                                                                   <input type='text' class="form-control" name="iniciodomingo" id="horarioinicio"/>
                                                                   <span class="input-group-addon">
                                                                       <span class="glyphicon glyphicon-time"></span>
                                                                   </span>
                                                               </div>
                                                            {{-- HORARIO --}}
                                                        {{-- Desde --}}

                                                        {{-- Hasta --}}
                                                            {!! Form::label('Horas asignadas de trabajo',null,['class'=>'label label-primary']) !!}
                                                            {!! Form::number('asignadasdomingo',null,['class'=>'form-control','min'=>'6','max'=>'12','patterns'=>'{0-9}']) !!}
                                                        {{-- Hasta --}}

                                                        {{-- Jornada --}}
                                                            {!! Form::label('Tipo Jornada',null,['class'=>'label label-primary']) !!}

                                                            {{-- jornadas --}}
                                                                <select class="form-control" name="">
                                                                    <option value="option">Matutino</option>
                                                                    <option value="option">Vespertino</option>
                                                                    <option value="option">Diurno</option>
                                                                </select>
                                                            {{-- jornadas --}}
                                                        {{-- Jornada --}}
                                                    </div>
                                                    {{-- Box para activar *--}}


                                            </div>

                                        </div>
                                    </div>
                            </div>
                            {{-- GENERACION DIA DOmingo --}}

                            {!! Form::submit('Generar turno mensual',['class'=>'btn btn-primary']) !!}
                            {!!Form::close()!!}
                        </div>
                        {{-- BODY --}}

                                        </div>
                                </div>
                            {{-- GENERACION SEMANAL --}}

                      </div>
                      {{-- BODY --}}
                    </div>
                </div>
                <!--  Generacion Turnos-->


            </section>

        </section>
    <!--  Section Content Yield-->
@endSection

@section('scripts')
    <script src="{{asset('assets/js/moment-with-locales.js')}}" charset="utf-8"></script>
    <script src="{{asset('assets/js/bootstrap-datetimepicker.js')}}" charset="utf-8"></script>
    <script src="{{asset('assets/js/generarTurno.js')}}" charset="utf-8"></script>


@endsection
