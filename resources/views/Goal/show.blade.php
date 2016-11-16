@extends('layouts.admin')
    @section('content')
    <!--  Section Content Yield-->
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
    @if (Session::has('message'))
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <ul>
                  <li>
                      <i class="glyphicon glyphicon-calendar"></i> <strong>{{ Session::get('message') }}</strong>
                  </li>
          </ul>
        </div>
    @endif
        <section class="content">

            <section class="box-objetivo-detalle__container">
                <!-- <div class="box-detalle__item--objetivo"> -->

                    <!--  Objetivo-->
                    <div class="col-sm-12 col-md-4 box-objetivo">
                        <div class="thumbnail">
                            <img src="/assets/images/uploads/{{$goal->path}}" alt="...">
                            <div class="caption">
                                <h3 style="text-transform: uppercase;">{{$goal->nombre}}</h3>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <i class="glyphicon glyphicon-barcode"></i>
                                        <strong>Codigo Objetivo: </strong> {{$goal->cod_legajo}}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="glyphicon glyphicon-map-marker"></i>
                                        <strong>Direccion: </strong> {{$goal->direccion}}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="glyphicon glyphicon-phone-alt"></i>
                                        <strong>  Telefono: </strong> {{$goal->telefono}}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="glyphicon glyphicon-wrench"></i>
                                        <strong>Representante: </strong> {{$goal->representante}}
                                    </li>
                                </ul>
                                <p>
                                    {!!link_to_route('objetivos.edit',$title='Editar',$parameters = $goal->id ,$attributes = ['class'=>'btn btn-primary'])!!}

                                    {!! Form::open(['route'=>['objetivos.destroy',$goal->id],'method'=>'DELETE']) !!}
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
                    <div class="table-responsive">
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                                <div class="panel-heading"><strong>Empleados Fijos: {{ count($getEmployees)}}</strong></div>
                                @if (count($getEmployees) > 0)
                                    <!-- Table -->
                                    @foreach ($getEmployees as $getEmployee)
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th>Codigo Legajo</th>
                                                    <th>Nombre y apellido</th>
                                                    <th>Telefono</th>
                                                    <th> Ver empleado</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td><label class="label label-info"> {{$getEmployee->employee->legajo}}</label></td>
                                                    <td>{{$getEmployee->employee->nombre}} {{$getEmployee->employee->apellido}}</td>
                                                    <td>{{$getEmployee->employee->telefono}}</td>
                                                    <td>
                                                        <a href="/empleados/{{$getEmployee->employee->id}}">
                                                            <i class="glyphicon glyphicon-user"></i>
                                                        </a>
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

                    </div>
                    <!--  Detalle informacion-->
            </section>

        </section>
    <!--  Section Content Yield-->
@endSection
