@extends('layouts.admin')
    @section('content')
        <!--  Section Content Yield-->
            <section class="content over">
                <div class="jumbotron">
                    <div class="row">
                        <!--  Formulario CREATE or UPDATE-->
                        <div class="box-crud__container">
                            <h1> Alta Empleados</h1>

                             <div class="col-sm-6 col-sm-offset-3">
                                    {{-- Formulario --}}
                                    {!! Form::Open(['route'=>'empleados.store','method'=>'POST','class'=>'box-crud__container--form','files'=>true])!!}
                                    {{--  Includes--}}
                                        @include('partials.forms.employeeForm')
                                    {{--  Includes--}}
                                        {!! Form::submit('Dar de alta',['class'=>'btn btn-success'])!!}
                                    {!! Form::Close()!!}
                                    {{-- Formulario --}}
                            </div>
                        </div>
                        <!--  Formulario CREATE or UPDATE-->
                    </div>
                </div>
            </section>
    @endsection
