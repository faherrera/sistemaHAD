@extends('layouts.admin')
    @section('content')
        <section class="content over">
            <div class="container">
                <br>
                <br>
                <br>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">Generacion Individual de turnos</div>
                           <div class="panel-body">
                                {{-- PANEL --}}
                                {!! Form::model($shift,['route'=>['turnos.update',$shift->id],'method'=>'PUT']) !!}

                                    {{-- Include --}}
                                    {{--      Inicio FOrm--}}
                                        <div class="panel panel-success">
                                            <div class="panel-heading"> Empleado asignado al turno: </div>
                                                <div class="panel-body">
                                                        {{--  El empleado no se modifica--}}
                                                        {!! Form::select('employee_id',[$shift->employee_id => $shift->employee->nombre." ".$shift->employee->apellido],null,['readonly','class'=>'form-control']) !!}

                                                        {{--  El empleado no se modifica--}}

                                                </div>
                                                <div class="panel-heading ">Configuracion del turno </div>
                                                <div class="panel-body">
                                                        <label for="" class="label label-primary"> Inicio de turno</label>
                                                            <div class="form-group">

                                                               <div class='input-group date'  id='datetimepicker6'>
                                                                   <input type='text' name="inicio" id="inicio" class="form-control" value="{{$shift->inicio}}"/>
                                                                   <span class="input-group-addon">
                                                                       <span class="glyphicon glyphicon-calendar"></span>
                                                                   </span>
                                                               </div>
                                                            </div>
                                                        <label for="" class="label label-primary"> Horas Asignadas </label>
                                                            <div class="form-group">
                                                              {!! Form::number('horasAsignadas',$diferenciaEnHoras,['class'=>'form-control','min'=>'6','max'=>'12']) !!}
                                                            </div>
                                                        <label for="" class="label label-primary"> Feriado</label>
                                                        <div class="form-group">
                                                            <ul class="list-group">
                                                                @if ($shift->feriado == 0)
                                                                    <li class="list-group-item">
                                                                        {!! Form::radio('feriado', '1', false)!!} <i class="glyphicon glyphicon-ok" style="color:green"> SI</i>

                                                                    </li>

                                                                    <li class="list-group-item">
                                                                        {!! Form::radio('feriado', '0', true)!!} <i class="glyphicon glyphicon-remove" style="color:red"> No</i>

                                                                    </li>
                                                                @else
                                                                    <li class="list-group-item">
                                                                        {!! Form::radio('feriado', '1', true)!!} <i class="glyphicon glyphicon-ok" style="color:green"> SI</i>

                                                                    </li>

                                                                    <li class="list-group-item">
                                                                        {!! Form::radio('feriado', '0', false)!!} <i class="glyphicon glyphicon-remove" style="color:red"> No</i>

                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </div>

                                                        <label for="" class="label label-primary"> Asistencia </label>
                                                        <div class="form-group">
                                                            <ul class="list-group">
                                                                @if ($shift->asistencia == 0)
                                                                    <li class="list-group-item">
                                                                        {!! Form::radio('asistencia', '1', false)!!} <i class="glyphicon glyphicon-ok" style="color:green"> SI estuvo presente</i>

                                                                    </li>

                                                                    <li class="list-group-item">
                                                                        {!! Form::radio('asistencia', '0', true)!!} <i class="glyphicon glyphicon-remove" style="color:red"> No estuvo presente</i>

                                                                    </li>
                                                                @else
                                                                    <li class="list-group-item">
                                                                        {!! Form::radio('asistencia', '1', true)!!} <i class="glyphicon glyphicon-ok" style="color:green"> SI estuvo presente</i>

                                                                    </li>

                                                                    <li class="list-group-item">
                                                                        {!! Form::radio('asistencia', '0', false)!!} <i class="glyphicon glyphicon-remove" style="color:red"> No estuvo presente</i>

                                                                    </li>
                                                                @endif

                                                            </ul>
                                                        </div>

                                                </div>
                                            <div class="panel-heading"> Objetivo asignado al turno </div>
                                                    <div class="panel-body">
                                                        {{--  El empleado no se modifica--}}
                                                        {!! Form::select('goal_id',[$shift->goal_id => "Nombre: ".$shift->goal->nombre."|| Direccion:  ".$shift->goal->direccion],null,['readonly','class'=>'form-control']) !!}

                                                        {{--  El empleado no se modifica--}}

                                                    </div>
                                        {{-- Form FIn --}}

                                            <input type="hidden" name="shift_id" value="{{$shift->shift_id}}">
                                                {{-- BOTON --}}
                                                {!!Form::submit('Cargar Turno',['class'=>'btn btn-primary','id'=>'btnEnviar']) !!}
                                                {{-- BOTON --}}
                                    </div>
                                {{-- PANEL --}}
                                {!! Form::close() !!}

                           </div>
                          </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    @endsection

    @section('scripts')
        <script src="{{asset('assets/js/moment-with-locales.js')}}" charset="utf-8"></script>
        <script src="{{asset('assets/js/bootstrap-datetimepicker.js')}}" charset="utf-8"></script>

        <script type="text/javascript">
            $(function () {
                var inicio;
                var transformacion;
                $('#datetimepicker6').datetimepicker({
                                    locale: 'en',
                                    format: 'YYYY/MM/DD HH:mm'
                                });

                    $("#datetimepicker6").on("dp.change", function (e) {
                    });

                    // $('#btnEnviar').click(function(e){
                    //     e.preventDefault();
                    //     inicio = $('#inicio').val();
                    //     console.log(inicio);
                    //     console.log(inicio.getHours());
                    //
                    // });


                });
        </script>
    @endsection
