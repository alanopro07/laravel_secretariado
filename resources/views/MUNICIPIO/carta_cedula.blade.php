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

<!------- BLOQUE 02 -------------->
<!----------------------------------->

<div class="container mt-3">
    <div class="row text-center">
        <div class="col-md-12 bg-light">
            <h3>Cédula de identificación fiscal (SAT)</h3>
        </div>
        <div class="col-md-6 bg-light">

            <div class="form-group">
                <label>Nombre archivo</label>
                <input type="text"  class="form-control"  id="nombre_cedula_fiscal" name="nombre_cedula_fiscal" value="" placeholder="Ingresar nombre Cedula Fiscal">
            </div>
            <div class="form-group">
                <label>RFC</label>
                <input type="text"   class="form-control"  id="rfc" name="rfc" value="" placeholder="Ingresar RFC" pattern="^[A-Z]{3}\d{6}[A-Z\d]{3}">
            </div>
            <div class="form-group">
                <label>Razón social</label>
                <input type="text"  class="form-control"  id="razon_social" name="razon_social" value="" placeholder="Ingresar razón social" >
            </div>
        </div>
        <div class="col-md-6 bg-light">
            <div class="form-group">
                <label>Folio ó idCIF</label>
                <input type="text"  class="form-control"  id="numero_folio" name="numero_folio" value="" placeholder="Ingresar Folio">
            </div>
            <label class="text-center">Clic para cargar documento *PDF</label>
            <div class="col-md-12 ">
                <div class="btn btn-default carga-archivo-input">
                    <span class="carga-archivo-input-title">Adjuntar cedula fiscal (SAT)</span>
                    <input type="file" accept="application/pdf" name="cedula_fiscal_sat" />
                </div>
            </div>
        </div>
        <div class="col-md-12 bg-light pt-2">
            <a href="{{ route('municipio') }}"><button type="button" class="btn btn-lg btn-primary">Cerrar</button></a>
            <button type="submit" class="btn btn-lg btn-primary">Enviar</button>
        </div>
    </div>
</div>

<!-------FIN BLOQUE 02 -------------->
<!----------------------------------->


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
