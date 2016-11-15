@extends('layouts.admin')
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-6">

                    <img src="{{asset('/assets/images/logotipo/512.png')}}" style="max-height:280px;"alt="" >
                </div>
                <div class="col-md-offset-3 col-md-6" >
                    <h1 style="font-size:8rem; "> Sistema H.A.D</h1>
                    <div class="form-group">
                        {!! Form::open()!!}
                        <label for="">Email</label>
                        <input type="email" name="" id="" class="form-control">
                        <label for="">Contraseña</label>
                        <input type="password" name="" id="" class="form-control">
                        {!! Form::submit('Ingresar',['class'=>'btn btn-primary']) !!}
                        {!! Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    @endsection
