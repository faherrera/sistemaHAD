@extends('layouts.admin')
    @section('content')

    <section class="content over">
        {{-- Mensaje --}}
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>{{Session::get('message')}}</strong>
            </div>
        @endif
        {{-- Mensaje --}}
        <!-- Row -->
        <div class="row">

            <!--  Empleado-->
                @foreach ($employees as $employee)

                  <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                      <img src="/assets/images/uploads/{{$employee->path}}" alt="...">
                      <div class="caption">
                        <h3 style="text-align: center;">{{$employee->nombre}} {{$employee->apellido}}</h3>
                        <ul>
                            <li>
                                <strong>Numero de legajo: </strong> {{$employee->legajo}}
                            </li>
                            <li>
                                <strong>Domicilio: </strong> {{$employee->direccion}}
                            </li>
                        </ul>
                        <p><a href="/empleados/{{$employee->id}}" class="btn btn-primary" role="button">Más Informacion</a></p>
                      </div>
                    </div>
                  </div>
                @endforeach
              <!--  Empleado-->


        </div>
        <!-- Row -->

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
