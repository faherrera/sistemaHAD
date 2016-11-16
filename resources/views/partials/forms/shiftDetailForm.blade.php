{{--      Inicio FOrm--}}
    <div class="panel panel-success">
        <div class="panel-heading"> Elegir Empleado </div>
            <div class="panel-body">
                    {!! Form::select('employee_id', $employees,null,['class'=>'form-control']) !!}

            </div>
            <div class="panel-heading ">Configuracion del turno </div>
            <div class="panel-body">
                    <label for="" class="label label-primary"> Inicio de turno</label>
                        <div class="form-group">

                           <div class='input-group date'  id='datetimepicker6'>
                               <input type='text' name="inicio" id="inicio" class="form-control" />
                               <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                               </span>
                           </div>
                        </div>
                    <label for="" class="label label-primary"> Horas Asignadas </label>
                        <div class="form-group">
                          {!! Form::number('horasAsignadas',null,['class'=>'form-control','min'=>'6','max'=>'12']) !!}
                        </div>
                    <label for="" class="label label-primary"> Feriado</label>
                    <div class="form-group">
                        <ul class="list-group">
                            <li class="list-group-item">
                                {!! Form::radio('feriado', '0', true)!!} <i class="glyphicon glyphicon-remove" style="color:red"> No es feriado</i>

                            </li>

                            <li class="list-group-item">
                                {!! Form::radio('feriado', '1', false)!!} <i class="glyphicon glyphicon-ok" style="color:green"> SI es feriado</i>

                            </li>
                        </ul>
                    </div>

            </div>
        <div class="panel-heading"> Elegir Objetivo </div>
                <div class="panel-body">
                        {!! Form::select('goal_id', $goals,null,['class'=>'form-control']) !!}

                </div>
    {{-- Form FIn --}}
