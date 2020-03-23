@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="bg-white mb-4 rounded " style="width: 700px;">
            <img src="adminlte/img/logo2.png"  class="img-fluid">
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Registro de usuario') }}</div>

                <div class="card-body">
                    {{ Form::open(array('url' => 'register', 'method' => 'post' , 'accept-charset' =>"UTF-8",'enctype' => 'multipart/form-data'))  }}
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido_paterno" class="col-md-4 col-form-label text-md-right">Apellio Paterno</label>

                            <div class="col-md-6">
                                <input id="apellido_paterno" type="text" class="form-control" name="apellido_paterno" value="" required>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellido_materno" class="col-md-4 col-form-label text-md-right">Apellio Materno</label>

                            <div class="col-md-6">
                                <input id="apellido_materno" type="text" class="form-control" name="apellido_materno" value="" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">Telefono</label>

                            <div class="col-md-6">
                                <input id="telefono" type="tel" class="validanumericos form-control" name="telefono" value="" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cargo" class="col-md-4 col-form-label text-md-right">Cargo</label>

                            <div class="col-md-6">
                                <input id="cargo" type="text" class="form-control" name="cargo" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dependencia" class="col-md-4 col-form-label text-md-right">Dependencia</label>

                            <div class="col-md-6">
                                <input id="dependencia" type="text" class="form-control" name="dependencia" value="" required>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre de usuario</label>
                            <div class="col-md-6">
                                <input id="login" type="text" class="form-control" name="login" value="{{ old('login') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" >
                            </div>
                        </div>
                        <div class="form-group row  d-flex justify-content-center" >
                            <div class="btn btn-default carga-archivo-input">
                                <span class="carga-archivo-input-title">Adjuntar imagen</span>
                                <input type="file" accept="image/png, image/jpeg, image/jpg" name="archivo_imagen_usuario" required />
                                <!-- rename it -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">

                                <button type="submit" class="btn btn-block btn-primary">
                                    {{--                                    {{ __('Register') }}--}}
                                    Guardar
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
    $(function(){

        $('.validanumericos').keypress(function(e) {
            if(isNaN(this.value + String.fromCharCode(e.charCode)))
                return false;
        })
            .on("cut copy paste",function(e){
                e.preventDefault();
            });

    });
</script>
@endsection
