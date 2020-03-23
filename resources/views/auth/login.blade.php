<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard | Siass</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="adminlte/css/adminlte.min.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="rounded d-flex flex-column align-items-center justify-content-center" style="background-color: #621132;">
    <div class="bg-white mb-4 rounded mt-5" style="width: 448px;">
        <a href="{{url('/')}}"><img src="adminlte/img/logo2.png"  class="img-fluid"></a>
    </div>
{{--@section('content')--}}
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 rounded">
                    <div class="card shadow">
                        <div class="card-header text-gray text-center">{{ __('Ingresa tus datos') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="login" type="text" class="form-control" name="login" value="{{ old('login') }}" placeholder="Ingresar usuario" required autofocus>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Ingresar contraseña" required>
                                        {{$errors->first('login')}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12 ">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label text-gray" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12 ">
                                        <button type="submit" class="btn btn-primary  btn-block">
                                            {{ __('Login') }}
                                        </button>
                                        <a href="{{url('/')}}"><label class="btn btn-primary  btn-block">
                                            Regresar al Inicio
                                        </label></a>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link a-ginda" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--incluir sweet alert--}}
    @include('sweetalert::alert')
</body>
</html>

