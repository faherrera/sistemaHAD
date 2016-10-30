@extends('layouts.admin')
    @section('content')

    <section class="content over">

        <!-- Row -->
        <div class="row">

            <!--  Empleado-->
              <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                  <img src="../assets/images/empleados/empleado-default.png" alt="...">
                  <div class="caption">
                    <h3 style="text-align: center;">Juan Alberto Perez</h3>
                    <ul>
                        <li>
                            <strong>Numero de legajo: </strong> 0001
                        </li>
                        <li>
                            <strong>Domicilio: </strong> Mate de luna 2300
                        </li>
                    </ul>
                    <p><a href="../empleados/detalle.html" class="btn btn-primary" role="button">Más Informacion</a></p>
                  </div>
                </div>
              </div>
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
