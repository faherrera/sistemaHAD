@extends('layouts.admin')
    @section('content')
        <section class="content over">
            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>{{Session::get('message')}}</strong>
                </div>
            @endif
            @if(Session::has('message-danger'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>{{Session::get('message-danger')}}</strong>
                </div>
            @endif
            <div class="row">

                @foreach($goals as $goal)
                <!--  Objetivo-->
                  <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                      <img src="/assets/images/uploads/{{$goal->path}}" alt="...">
                      <div class="caption">
                        <h3>{{$goal->nombre}}</h3>
                        <ul>
                            <li>
                                <strong>Codigo de objetivo: </strong> {{$goal->cod_legajo}}
                            </li>
                            <li>
                                <strong>Direccion: </strong> {{$goal->direccion}}
                            </li>
                            <li>
                                <strong>Telefono: </strong>{{$goal->telefono}}
                            </li>
                        </ul>
                        <p><a href="/objetivos/{{$goal->id}}" class="btn btn-primary" role="button">Ver detalles</a></p>
                      </div>
                    </div>
                  </div>
                  <!--  Objetivo-->
                @endforeach



            </div>

            <div style="text-align: center;">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        </section>
    @endsection
