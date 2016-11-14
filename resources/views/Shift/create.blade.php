@extends('layouts.admin')
    @section('content')
        <section class="content over">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">Generacion mensual de turnos</div>
                           <div class="panel-body">
                                {{-- PANEL --}}
                                    <div class="panel panel-success">
                                        <div class="panel-heading"> Generacion dia: Lunes </div>
                                            <div class="panel-body">

                                                <form action="" class="form-group">
                                                    <label for=""> Empleado </label>
                                                        <select class="" name="jornada">
                                                            <option value="vespertino">Jesus Figueroa</option>
                                                            <option value="matutino">Jhonattan Figueroa</option>
                                                            <option value="diurno">Jose Hernandez</option>
                                                        </select>
                                                    <label for=""> Inicio de horario:</label>
                                                    <input type="date" name="dateStart" id="dateStart">
                                                    <label for=""> Horas asignadas</label>
                                                    <input type="number" name="dateStart" id="dateStart">
                                                    <label for=""> Jornada </label>
                                                        <select class="" name="jornada">
                                                            <option value="vespertino">Vespertino</option>
                                                            <option value="matutino">Matutino</option>
                                                            <option value="diurno">Diurno</option>
                                                        </select>
                                                </form>
                                                
                                            </div>
                                    </div>
                                {{-- PANEL --}}

                           </div>
                          </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    @endsection

    @section('scripts')
        <script src="{{asset('/assets/js/moment-with-locales.js')}}" charset="utf-8"></script>
        <script src="{{asset('/assets/js/bootstrap-datetimepicker.js')}}" charset="utf-8"></script>
    @endsection
