<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

    <link rel="stylesheet" href="adminlte/css/estilos.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="" >
<!-- Site wrapper -->


        <!-- INICIO FORM MASTER -->
    {{ Form::open(array('url' => 'cargaDatosCartaBancaria', 'method' => 'post' , 'accept-charset' =>"UTF-8",'enctype' => 'multipart/form-data'))  }}

    <!----------------------------------->
        <!-------INICIO BLOQUE 01 ----------->
        <div class="container d-flex mt-5 justify-content-center align-items-center rounded bg-light shadow-lg">
            <div class="row text-center">
                <div class="col-md-12">
                    <h3 class="text-center bg-light">Carta bancaria  (cuenta concentradora)</h3>
                </div>
                <div class="col-md-6 bg-light">

                    <div class="form-group">
                        <label>Carta Bancaria</label>
                        <input type="text"  class="form-control"  id="carta_bancaria_nombre" name="carta_bancaria_nombre" value="" placeholder="Ingresar nombre carta bancaria" >
                    </div>

                    <div class="form-group">
                        <label>Cuenta clave</label>
                        <input type="text"  class="validanumericos form-control"  id="cuenta_clave" name="cuenta_clave" value="" placeholder="Ingresar cuenta clave" >
                    </div>

                    <div class="form-group">
                        <label>Agregar responsable de cuenta</label>
                        <span>
                            <a href=""><i class="fas fa-user-plus" style="font-size: 30px; color: #621132;" ></i></a>
                        </span>
                    </div>


                </div>
                <div class="col-md-6 bg-light">

                    <div class="form-group">
                        <label>Numero de cuenta</label>
                        <input type="text"  class="validanumericos form-control"  id="numero_cuenta" name="numero_cuenta" value="" placeholder="Ingresar numero de cuenta" >
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Institución Bancaria</label>
                            <select class="browser-default custom-select" name="institucion_bancaria" id="institucion_bancaria" >
                                <option value="0">Selecciona un banco</option>
                                <option value="1">Banco Nacional de México (Banamex)</option>
                                <option value="2">Banco Santander (México)</option>
                                <option value="3">HSBC México</option>
                                <option value="4">Scotiabank Inverlat</option>
                                <option value="5">BBVA Bancomer</option>
                                <option value="6">Banco Mercantil del Norte (Banorte)</option>
                                <option value="7">Banco Inbursa</option>
                                <option value="8">Banco del Bajio</option>
                                <option value="9">Banco Azteca</option>
                                <option value="10">Bancopel</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Clic para cargar documento *PDF</label>
                            <div class="btn btn-default carga-archivo-input">
                                <span class="carga-archivo-input-title">Adjuntar carta bancaria</span>
                                <input type="file" accept=".pdf" name="archivo_carta_bancaria" />
                                <!-- rename it -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 bg-light pt-2">
                    <a href="{{ route('municipio') }}"><button type="button" class="btn btn-lg btn-primary">Cerrar</button></a>
                    <button type="submit" class="btn btn-lg btn-primary">Enviar</button>
                </div>
            </div>
        </div>
        <!-------FIN BLOQUE 01 -------------->


<!-- jQuery -->
<script src="adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/js/adminlte.js"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<script >
    $('#datetime').datepicker({
        format: 'yyyy/mm/dd',
        autoclose: true,
        todayBtn: true
    });

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


<script >
    var indiceInicial = 1;
    $("#siguiente").click(function(){
        if(indiceInicial == 4){
            indiceInicial = 1;
        }
        for (i = 1; i < 5; i++){
            if(i != indiceInicial ){
                $("#bloque"+indiceInicial).hide(500);
            }
        }
        indiceInicial ++;
        $("#bloque"+indiceInicial).show(500);
    });
</script>

</body>
</html>
