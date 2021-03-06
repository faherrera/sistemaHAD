<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">


</head>

<body>

<!--  Inicio Main -->
<main role="main" class="main-admin">
    <!-- Header -->
    <header class="principal-header">
        <!--  Navegacion.-->
        <nav class="navbar navbar-default" role="navigation">
          <!-- El logotipo y el icono que despliega el menú se agrupan
               para mostrarlos mejor en los dispositivos móviles -->
          <div class="navbar-header">
              <img src="{{asset('/assets/images/logotipo/64.png')}}" class="admin-menu__img-logo"alt="">

            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-ex1-collapse">
              <span class="sr-only">Desplegar navegación</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
            </a>
          </div>

          <!-- Agrupar los enlaces de navegación, los formularios y cualquier
               otro elemento que se pueda ocultar al minimizar la barra -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">

            <ul class="nav navbar-nav">
              <!-- <li class="active"><a href="#">Enlace #1</a></li>
              <li><a href="#">Enlace #2</a></li> -->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Turnos <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="{{URL::to('/turnos/create')}}">Crear Turno </a></li>
                  <li class="divider"></li>
                  <li><a href="{{URL::to('/turnos/')}}">Ver listado de turnos</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Objetivos <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="{{URL::to('/objetivos/create')}}">Crear Objetivos</a></li>
                  <li class="divider"></li>
                  <li><a href="{{URL::to('/objetivos')}}">Ver listado de Objetivos</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Empleados <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="{{URL::to('/empleados/create')}}">Crear empleado</a></li>
                  <li class="divider"></li>
                  <li><a href="{{URL::to('/empleados/')}}">Ver listado de empleados</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Usuarios <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="{{URL::to('/users/create')}}">Enlazar Usuarios</a></li>
                  <li class="divider"></li>
                  <li><a href="{{URL::to('/users/')}}">Listado de usuarios</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Enlazar Objetivos y empleados <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="{{URL::to('/relacionEG/create')}}">Crear Enlace</a></li>
                  <li class="divider"></li>
                  {{-- <li><a href="{{URL::to('/generarTurno/create')}}">Generar Turno </a></li> --}}
                </ul>
              </li>
            </ul>
            <!--
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Buscar">
              </div>
              <button type="submit" class="btn btn-default">Enviar</button>
            </form> -->

            <ul class="nav navbar-nav navbar-right">
              <!-- <li><a href="#">Enlace #3</a></li> -->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <strong class="admin-menu__user-name"><i class="glyphicon glyphicon-user"></i> Sr. Jose Barraza</strong> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="#">Mi perfil</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Cerrar Sesion</a></li>
                </ul>
              </li>
            </ul>
            </div>
        </nav>
        <!--  Navegacion.-->
    </header>
    <!-- Header -->

    <!--  Section Content Yield-->
        @yield('content')
    <!--  Section Content Yield-->

</main>

<!-- Fin Main -->


<!--  SCRIPTS-->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
<!--  SCRIPTS-->
@section('scripts')
@show

</body>

</html>
