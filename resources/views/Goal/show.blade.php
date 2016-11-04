@extends('layouts.admin')
    @section('content')
    <!--  Section Content Yield-->
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
                                    <a href="./objetivos/detalle.html" class="btn btn-primary" role="button">Editar</a>
                                    <a href="./objetivos/detalle.html" class="btn btn-danger" role="button"> Eliminar</a>
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
                        <div class="table-responsive">
                            <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading"><strong>Turnos del mes</strong></div>
                                <!-- Table -->
                                <table class=" table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Inicio</th>
                                            <th>Finalizacion</th>
                                            <th>Jornada</th>
                                            <th>Editar Turno</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--  Turno #-->
                                        <tr>
                                            <td>03/10/2016 20:00:00</td>
                                            <td>04/10/2016 05:00:00</td>
                                            <td>Matutino</td>
                                            <td>
                                                <a href="#">
                                                    <strong>
                                                        <i class="glyphicon glyphicon-pencil">
                                                        </i>
                                                    </strong>
                                                </a>
                                            </td>
                                        </tr>
                                        <!--  Turno #-->
                                        <!--  Turno #-->
                                        <tr>
                                            <td>03/10/2016 20:00:00</td>
                                            <td>04/10/2016 05:00:00</td>
                                            <td>Matutino</td>
                                            <td>
                                                <a href="#">
                                                    <strong>
                                                        <i class="glyphicon glyphicon-pencil">
                                                        </i>
                                                    </strong>
                                                </a>
                                            </td>
                                        </tr>
                                        <!--  Turno #-->
                                        <!--  Turno #-->
                                        <tr>
                                            <td>03/10/2016 20:00:00</td>
                                            <td>04/10/2016 05:00:00</td>
                                            <td>Matutino</td>
                                            <td>
                                                <a href="#">
                                                    <strong>
                                                        <i class="glyphicon glyphicon-pencil">
                                                        </i>
                                                    </strong>
                                                </a>
                                            </td>
                                        </tr>
                                        <!--  Turno #-->
                                        <!--  Turno #-->
                                        <tr>
                                            <td>03/10/2016 20:00:00</td>
                                            <td>04/10/2016 05:00:00</td>
                                            <td>Matutino</td>
                                            <td>
                                                <a href="#">
                                                    <strong>
                                                        <i class="glyphicon glyphicon-pencil">
                                                        </i>
                                                    </strong>
                                                </a>
                                            </td>
                                        </tr>
                                        <!--  Turno #-->
                                        <!--  Turno #-->
                                        <tr>
                                            <td>03/10/2016 20:00:00</td>
                                            <td>04/10/2016 05:00:00</td>
                                            <td>Matutino</td>
                                            <td>
                                                <a href="#">
                                                    <strong>
                                                        <i class="glyphicon glyphicon-pencil">
                                                        </i>
                                                    </strong>
                                                </a>
                                            </td>
                                        </tr>
                                        <!--  Turno #-->
                                        <!--  Turno #-->
                                        <tr>
                                            <td>03/10/2016 20:00:00</td>
                                            <td>04/10/2016 05:00:00</td>
                                            <td>Matutino</td>
                                            <td>
                                                <a href="#">
                                                    <strong>
                                                        <i class="glyphicon glyphicon-pencil">
                                                        </i>
                                                    </strong>
                                                </a>
                                            </td>
                                        </tr>
                                        <!--  Turno #-->
                                        <!--  Turno #-->
                                        <tr>
                                            <td>03/10/2016 20:00:00</td>
                                            <td>04/10/2016 05:00:00</td>
                                            <td>Matutino</td>
                                            <td>
                                                <a href="#">
                                                    <strong>
                                                        <i class="glyphicon glyphicon-pencil">
                                                        </i>
                                                    </strong>
                                                </a>
                                            </td>
                                        </tr>
                                        <!--  Turno #-->
                                        <!--  Turno #-->
                                        <tr>
                                            <td>03/10/2016 20:00:00</td>
                                            <td>04/10/2016 05:00:00</td>
                                            <td>Matutino</td>
                                            <td>
                                                <a href="#">
                                                    <strong>
                                                        <i class="glyphicon glyphicon-pencil">
                                                        </i>
                                                    </strong>
                                                </a>
                                            </td>
                                        </tr>
                                        <!--  Turno #-->
                                        <!--  Turno #-->
                                        <tr>
                                            <td>03/10/2016 20:00:00</td>
                                            <td>04/10/2016 05:00:00</td>
                                            <td>Matutino</td>
                                            <td>
                                                <a href="#">
                                                    <strong>
                                                        <i class="glyphicon glyphicon-pencil">
                                                        </i>
                                                    </strong>
                                                </a>
                                            </td>
                                        </tr>
                                        <!--  Turno #-->
                                        <!--  Turno #-->
                                        <tr>
                                            <td>03/10/2016 20:00:00</td>
                                            <td>04/10/2016 05:00:00</td>
                                            <td>Vespertino</td>
                                            <td>
                                                <a href="#">
                                                    <strong>
                                                        <i class="glyphicon glyphicon-pencil">
                                                        </i>
                                                    </strong>
                                                </a>
                                            </td>
                                        </tr>
                                        <!--  Turno #-->
                                        <!--  Turno #-->
                                        <tr>
                                            <td>03/10/2016 20:00:00</td>
                                            <td>04/10/2016 05:00:00</td>
                                            <td>Matutino</td>
                                            <td>
                                                <a href="#">
                                                    <strong>
                                                        <i class="glyphicon glyphicon-pencil">
                                                        </i>
                                                    </strong>
                                                </a>
                                            </td>
                                        </tr>
                                        <!--  Turno #-->
                                        <!--  Turno #-->
                                        <tr>
                                            <td>03/10/2016 20:00:00</td>
                                            <td>04/10/2016 05:00:00</td>
                                            <td>Diurno</td>
                                            <td>
                                                <a href="#">
                                                    <strong>
                                                        <i class="glyphicon glyphicon-pencil">
                                                        </i>
                                                    </strong>
                                                </a>
                                            </td>
                                        </tr>
                                        <!--  Turno #-->
                                        <!--  Turno #-->
                                        <tr>
                                            <td>03/10/2016 20:00:00</td>
                                            <td>04/10/2016 05:00:00</td>
                                            <td>Diurno</td>
                                            <td>
                                                <a href="#">
                                                    <strong>
                                                        <i class="glyphicon glyphicon-pencil">
                                                        </i>
                                                    </strong>
                                                </a>
                                            </td>
                                        </tr>
                                        <!--  Turno #-->

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Tabla Turnos -->

                    </div>
                    <!--  Detalle informacion-->
            </section>

        </section>
    <!--  Section Content Yield-->
@endSection
