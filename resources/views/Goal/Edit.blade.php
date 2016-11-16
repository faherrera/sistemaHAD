@extends('layouts.admin')
    @section('content')
        @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <ul>
                  @foreach ($errors->all() as $error)
                      <li><i class="glyphicon glyphicon-fire"></i> <strong>{{ $error }}</strong></li>
                  @endforeach
              </ul>
            </div>
        @endif
        <!--  Section Content Yield-->
            <section class="content">
                <div class="jumbotron">
                    <div class="row">
                        <!--  Formulario CREATE or UPDATE-->
                        <div class="box-crud__container">
                            <h1> Alta Objetivos</h1>

                             <div class="col-sm-6 col-sm-offset-3">

                                {!! Form::model($goal,['route'=>['objetivos.update',$goal->id],'method'=>'PUT','files'=>true]) !!}
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
