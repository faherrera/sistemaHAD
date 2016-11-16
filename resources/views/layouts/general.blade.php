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
