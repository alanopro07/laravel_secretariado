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
<div class="container">
    <div class="row d-flex flex-column align-content-center">
            <div class="col-md-5 mt-5 mb-4 bg-white  rounded " >
                <img src="{{asset('adminlte/img/logo.png')}}" class="img-fluid">
            </div>
            <div class="card shadow-lg col-md-5">
                <div class="card-header text-center">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">


                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Ingresar contraseña" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

    </div>
</div>
