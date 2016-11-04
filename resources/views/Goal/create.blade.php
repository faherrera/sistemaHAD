@extends('layouts.admin')
    @section('content')

        <!--  Section Content Yield-->
            <section class="content">
                <div class="jumbotron">
                    <div class="row">
                        <!--  Formulario CREATE or UPDATE-->
                        <div class="box-crud__container">
                            <h1> Alta Objetivos</h1>

                             <div class="col-sm-6 col-sm-offset-3">

                                {!! Form::open(['route'=>'objetivos.store','method'=>'POST','files'=>true]) !!}
                                    {{-- Include --}}
                                        @include('partials.forms.goalForm')
                                    {{-- Include --}}
                                    {!! Form::submit('Crear objetivo',['class'=>'btn btn-success']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <!--  Formulario CREATE or UPDATE-->
                    </div>
                </div>
            </section>
        <!--  Section Content Yield-->
    @endsection
    @section('scripts')
         <script src="{{asset('/assets/js/goal.js')}}"></script>
    @endsection
