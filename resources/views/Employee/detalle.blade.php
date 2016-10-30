@extends('layouts.admin')
    @section('content')
    <!--  Section Content Yield-->
        <section class="content">

            <section class="box-objetivo-detalle__container">
                <!-- <div class="box-detalle__item--objetivo"> -->

                    <!--  Objetivo-->
                    <div class="col-sm-12 col-md-4 box-objetivo">
                        <div class="thumbnail">
                            <img src="../assets/images/empleados/empleado-default2.png" alt="...">
                            <div class="caption">
                                <h3 style="text-transform: uppercase;">Juan Alberto Perez</h3>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <i class="glyphicon glyphicon-barcode"></i>
                                        <strong>Codigo Legajo: </strong> 00001
                                    </li>
                                    <li class="list-group-item">
                                        <i class="glyphicon glyphicon-map-marker"></i>
                                        <strong>Direccion: </strong> Santiago 81
                                    </li>
                                    <li class="list-group-item">
                                        <i class="glyphicon glyphicon-phone-alt"></i>
                                        <strong>  Telefono: </strong> (0381) 4839202
                                    </li>
                                    <li class="list-group-item">
                                        <i class="glyphicon glyphicon-usd"></i>
                                        <strong>  Sumatoria Adelanto: </strong> $300

                                    </li>
                                    <li class="list-group-item">
                                        <i class="glyphicon glyphicon-pushpin"></i>
                                        <strong>  Notas: </strong>

                                    </li>
                                    <textarea name="notas" rows="8" cols="40">

                                    </textarea>
                                    <li class="list-group-item">
                                        <i class="glyphicon glyphicon-wrench"></i>
                                        <strong>Cargo del empleado: </strong> Fijo
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
                        <div class="panel panel-default table-responsive">
                            <!-- Default panel contents -->
                            <div class="panel-heading"><strong>Objetivo</strong></div>
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
                                            <td><label class="label label-info"> 00002</label></td>
                                            <td>Santiago 81</td>
                                            <td>Santiago 81</td>
                                            <td>
                                                <button type="button" class="btn btn-success">

                                                Más detalles</button>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <!-- Tabla Empleados -->

                        <!-- Tabla Turnos -->
                            <div class="panel panel-default table-responsive">
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

                <!--  Detalle informacion-->
            </section>

        </section>
    <!--  Section Content Yield-->
@endsection
