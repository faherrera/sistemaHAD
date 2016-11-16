@extends('layouts.admin')
    @section('content')
    <!--  Section Content Yield-->
        <section class="content">
            @if (Session::has('message-turnosGenerados'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <ul>
                          <li><i class="glyphicon glyphicon-calendar"></i> <strong>{{ Session::get('message-turnosGenerados') }}</strong></li>
                  </ul>
                </div>
            @endif
            @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <ul>
                          <li>
                              <i class="glyphicon glyphicon-calendar"></i> <strong>{{ Session::get('message') }}</strong>
                          </li>
                  </ul>
                </div>
            @endif
            @if (Session::has('message-danger'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <ul>
                          <li>
                              <i class="glyphicon glyphicon-calendar"></i> <strong>{{ Session::get('message-danger') }}</strong>
                          </li>
                  </ul>
                </div>
            @endif

            <section class="box-objetivo-detalle__container">
                <!-- <div class="box-detalle__item--objetivo"> -->

                    <!--  Objetivo-->
                    <div class="col-sm-12 col-md-4 box-objetivo">
                        <div class="thumbnail">
                            <img src="/assets/images/uploads/{{$employee->path}}" alt="...">
                            <div class="caption">
                                <h3 style="text-transform: uppercase;">{{$employee->nombre}} {{$employee->apellido}}</h3>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <i class="glyphicon glyphicon-barcode"></i>
                                        <strong>Codigo Legajo: </strong> {{$employee->legajo}}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="glyphicon glyphicon-map-marker"></i>
                                        <strong>Direccion: </strong> {{$employee->direccion}}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="glyphicon glyphicon-phone-alt"></i>
                                        <strong>  Telefono: </strong> {{$employee->telefono}}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="glyphicon glyphicon-wrench"></i>
                                        <strong>Cargo del empleado: </strong> <small style="text-transform: uppercase;">{{$employee->puesto}}</small>
                                    </li>
                                    <li class="list-group-item">
                                        <i class="glyphicon glyphicon-pushpin"></i>
                                        <strong>  Notas: </strong>

                                    </li>
                                    <textarea name="notas" readonly="readonly" class="form-control " rows="3" style="resize:none;">{{$employee->notes}}</textarea>
                                </ul>
                                <p>
                                    {!! link_to_route('empleados.edit', $title = "Editar", $parameters = $employee->id, $attributes=['class'=>'btn btn-success'])!!}
                                    {!! Form::open(['route'=>['empleados.destroy',$employee->id],'method'=>'DELETE']) !!}
                                        {!! Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
                                    {!! Form::close() !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--  Objetivo-->

                <!-- </div> -->


                <!--  Detalle informacion-->
                <div class="box-detalle__item--informacion col-sm-12 col-md-8">
                    <!-- Tabla Empleados -->
                        <div class="panel panel-default table-responsive">
                            <!-- Default panel contents -->
                            <div class="panel-heading"><strong>Objetivos asignados de manera fija: </strong> <span class="badge">{{count($getGoal)}}</span></div>
                            @if (count($getGoal) > 0)
                                @foreach ($getGoal as $relacion)
                                <!-- Table -->
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th>Codigo Objetivo</th>
                                                    <th>Nombre</th>
                                                    <th>Direccion</th>
                                                    <th> Ver objetivo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                        <td><label class="label label-info">{{$relacion->goal->cod_legajo}}</label></td>
                                                        <td>
                                                                {{$relacion->goal->nombre}}
                                                        </td>
                                                        <td>{{$relacion->goal->direccion}}</td>
                                                        <td>
                                                            <a href="/objetivos/{{$relacion->goal->id}}" class="btn btn-success"> Ver detalle</a>
                                                        </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                @endforeach
                            @endif

                            </div>
                        </div>
                    <!-- Tabla Empleados -->

                        <!-- Tabla Turnos -->
                            <div class="panel panel-default table-responsive">
                                <!-- Default panel contents -->
                                <div class="panel-heading"><strong>Turnos del mes</strong> <span class="badge">{{count($getDetailShifts)}}</span></div>
                                <!-- Table -->
                                @if (count($getDetailShifts) > 0)

                                        <table class=" table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Inicio</th>
                                                <th>Finalizacion</th>
                                                <th>Asistencia</th>
                                                <th>Feriado</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!--  Turno #-->
                                            @foreach ($getDetailShifts as $detail)
                                                <tr>
                                                    <?php
                                                        $fechaOriginalInicio = $detail->inicio;
                                                        $fechaModificadaInicio = date("d-m-Y H:m", strtotime($fechaOriginalInicio));

                                                        $fechaOriginalFinalizacion = $detail->finalizacion;
                                                        $fechaModificadaFinalizacion = date("d-m-Y H:m", strtotime($fechaOriginalFinalizacion));
                                                     ?>
                                                    <td>{{$fechaModificadaInicio}}</td>
                                                    <td>{{$fechaModificadaFinalizacion}}</td>
                                                        {{-- Control de asistencia --}}
                                                            @if ($detail->asistencia == 0)
                                                                <td><i class="glyphicon glyphicon-remove" style="color:red">No</i></td>
                                                            @else
                                                                <td><i class="glyphicon glyphicon-ok" style="color:green">Si</i></td>

                                                            @endif
                                                        {{-- Control de asistencia --}}

                                                        {{-- Control de asistencia --}}
                                                            @if ($detail->feriado == 0)
                                                                <td><i class="glyphicon glyphicon-remove" style="color:red">No</i></td>
                                                            @else
                                                                <td><i class="glyphicon glyphicon-ok" style="color:green">Si</i></td>

                                                            @endif
                                                        {{-- Control de asistencia --}}
                                                    <td>
                                                        {!!link_to_route('turnos.edit', $title = "Modificar", $parameters = $detail->id, $attributes = ['class'=>'btn btn-primary']) !!}
                                                        {!! Form::open(['route'=>['turnos.destroy',$detail->id],'method'=>'DELETE']) !!}
                                                            {!! Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
                                                        {!! Form::close() !!}

                                                        {{-- {!! link_to_action('Controller', $title, $parameters, $attributes) !!} --}}
                                                    </td>
                                                </tr>
                                                <!--  Turno #-->

                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif

                            </div>
                        </div>

                        <!-- Tabla Turnos -->

                <!--  Detalle informacion-->
            </section>

        </section>
    <!--  Section Content Yield-->
@endsection
