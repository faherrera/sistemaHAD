@extends('layouts.admin')
    @section('content')
        <section class="content">
            <div class="container">
                <!-- Tabla Empleados Fijos Sin Turnos Asignados -->
                <div class="table-responsive">
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading"><strong>Estos son todos los empleados fijos que tiene la empresa <span class="badge"> {{count($employee_goals)}}</span></strong></div>
                        <!-- Table -->
                        <table class=" table table-hover">
                            <thead>
                                <tr>
                                    <th>Empleado fijo</th>
                                    <th>Nombre Objetivo asignado</th>
                                    <th>Direccion Objetivo asignado</th>
                                    <th>Generar turno mensual</th>

                                    {{-- <th>Ver turno mensual</th>
                                    <th>Editar Turno</th> --}}
                                </tr>
                            </thead>
                            <tbody>

                                @if(count($employee_goals) > 0)
                                    <!--  Informacion #-->
                                    @foreach($employee_goals as $employee_goal)
                                        <tr>
                                            <td> {{ $employee_goal->employee->nombre}}</td>
                                            <td> {{ $employee_goal->goal->nombre}}</td>
                                            <td> {{ $employee_goal->goal->direccion}}</td>
                                            <td> <a href="/generarturno/{{$employee_goal->id}}" type="button" class="btn btn-success">Generar Turno</a></td>
                                        </tr>
                                    @endforeach
                                    <!--  Informacion #-->
                                @else

                                    <tr>
                                        <td>

                                            <i> No hay empleados fijos</i>
                                        </td>
                                    </tr>

                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Tabla Empleados Fijos Sin Turnos Asignados -->

                <!-- Tabla Empleados turnos asignados -->
                <div class="table-responsive">
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading"><strong>Empleados con turnos asignados para este mes <span class="badge">{{count($empleadosTurnosEsteMes)}}</span></strong></div>
                        <!-- Table -->
                        <table class=" table table-hover">
                            <thead>
                                <tr>
                                    <th>Empleado fijo</th>
                                    <th>Direccion Objetivo asignado</th>
                                    <th>Ver Empleado</th>

                                    {{-- <th>Ver turno mensual</th>
                                    <th>Editar Turno</th> --}}
                                </tr>
                            </thead>
                            <tbody>

                                @if(count($empleadosTurnosEsteMes) > 0)
                                    <!--  Informacion #-->
                                    @foreach($empleadosTurnosEsteMes as $empleadoDetalleTurno)
                                        <tr>
                                            <td> {{ $empleadoDetalleTurno->employee->nombre}}</td>
                                            <td> {{ $empleadoDetalleTurno->goal->direccion}}</td>
                                            <td> <a href="/empleados/{{$empleadoDetalleTurno->employee->id}}" type="button" class="btn btn-primary">Ver Turnos del empleado</a></td>
                                        </tr>
                                    @endforeach
                                    <!--  Informacion #-->
                                @else

                                    <tr>
                                        <td>

                                            <i> No hay empleados con turnos asignados para este mes</i>
                                        </td>
                                    </tr>

                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Tabla Empleados turnos asignados -->


            </div>
        </section>
    @endsection
