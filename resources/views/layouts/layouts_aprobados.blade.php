<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Siass</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Include Bootstrap Datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="adminlte/css/adminlte.min.css">
    {{-- Admin lte css     --}}
    <link rel="stylesheet" href="adminlte/css/estilos.css">
    {{--  Asset de la carpte public      --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini" >
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link d-flex justify-content-end" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        {{-- username        --}}
        <label class="d-flex"> Usuario registrado: {{ Auth::user()->nombre }} {{ Auth::user()->apellidoPaterno }} {{ Auth::user()->apellidoMaterno }}</label>
        <!-- Right navbar links -->

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="btn btn-primary btn-salir" href="{{ route('logout') }}">
                    {{ __('Salir') }}
                </a>
            </li>

        </ul>
        {{--        <img src="{{ Storage::url(Auth::user()->foto)  }}" class="img-circle ml-2" style="width: 25px; height: 25px;"  alt="avatar">--}}

    </nav>
    <!-- /.navbar -->
    <!-- INICIO Menú -->


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Logo y Nombre -->
        <a href="" class="brand-link">
            <img src="adminlte/img/logo-icon.png" class="img-circle elevation-2">
            <span class="brand-text font-weight-light">1ra Ministración</span>
        </a>

    <!-- /.sidebar -->
    </aside>


    <!-- FIN Menú -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header text-center">
            <div class="container-fluid">
                <div class="row">
                    {{--                     <h1>Dashboard  {{$municipio  }}  -  Estado: {{$estado}}</h1>
                     --}}                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

        <h1>{{$mensaje}}</h1>
        <!-- FIN Contenido de la Vista ----->
        </section>
        <!-- INICIO FORM MASTER -->
    </div>





    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0.0
        </div>
        <strong>Derechos reservados &copy; <?php echo date("Y") ?>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/js/adminlte.js"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

{{--<script type="text/javascript" src="{{asset('js/municipios.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('js/select_estados.js')}}"></script>--}}
{{--incluir sweet alert--}}
@include('sweetalert::alert')
</body>
</html>
