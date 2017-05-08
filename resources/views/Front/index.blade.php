@extends('layouts.admin')
    @section('content')
      @if(Session::has('message'))
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>{{Session::get('message')}}</strong> 
        </div>
      @endif

        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-6">

                    <img src="{{asset('/assets/images/logotipo/512.png')}}" style="max-height:280px;"alt="" >
                </div>
                <div class="col-md-offset-3 col-md-6" >
                    <h1 style="font-size:8rem; "> Sistema H.A.D</h1>
                    <div class="form-group">
                        {!! Form::open(['route'=>'log.store','method'=>'POST'])!!}
                          <label for="">Email</label>
                          <input type="email" name="email" id="" class="form-control">
                          <label for="">Contraseña</label>
                          <input type="password" name="password" id="" class="form-control">
                        {!! Form::submit('Ingresar',['class'=>'btn btn-primary']) !!}
                        {!! Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    @endsection
