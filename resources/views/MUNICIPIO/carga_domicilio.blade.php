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


<!------- BLOQUE 03 -------------->
<!----------------------------------->

<div class="container bg-light mt-3">
    <div class="col-md-12 bg-light">
        <h3 class="text-center">Datos de domicilio</h3>
    </div>
    <div class="row ">
        <div class="col-md-6 bg-light text-center">

            <div class="form-group">
                <label>Nombre comprobante domicilio</label>
                <input type="text"  class="calle form-control"  id="nombre_comprobante_domicilio" name="nombre_comprobante_domicilio" value="" placeholder="Ingresa nombre del archivo" >
            </div>
            <div class="form-group">
                <label>Tipo de comprobante</label>
                <select class="browser-default custom-select" name="tipo_comprobante" id="tipo_comprobante" >
                    <option value="0">Selecciona un tipo de comprobante</option>
                    <option value="1">Predio</option>
                    <option value="2">Luz</option>
                    <option value="3">Agua</option>
                    <option value="4">Telefono</option>
                </select>
            </div>
            <div class="form-group">
                <label>Entidad Federativa</label>
                <input type="text"  class="form-control"  id="entidad_federativa" name="entidad_federativa" value="" placeholder="Ingresar entidad federativa" >
            </div>
            <div class="form-group">
                <label>Delegación/Municipio</label>
                <input type="text"  class="form-control"  id="delegacion" name="delegacion" value="" placeholder="Ingresar delegación" >
            </div>

        </div>

        <div class="col-md-6 bg-light d-flex flex-column justify-content-center align-items-center ">

            <div class="col-md-6">
                <div class="form-group">
                    <label>Calle</label>
                    <input type="text"  class="form-control"  id="calle" name="calle" value="" placeholder="Ingresar nombre de calle" >
                </div>
                <div class="form-group">
                    <label>Codigo Postal</label>
                    <input type="text"  class="form-control"  id="codigo_postal" name="codigo_postal" value="" placeholder="Ingresar codigo postal" >
                </div>

                <div class="form-group">
                    <label>Fecha de comprobante</label>
                    <input size="16" type="text" class="form-control" id="datetime" name="fecha_comprobante_domicilio" readonly>
                    <span>(*Recibo de no mas de dos meses de antiguedad)</span>
                </div>
            </div>
        </div>
        <div class="col-md-12 bg-light d-flex justify-content-center">
            <a href="{{ route('municipio') }}"><button type="button" class="btn btn-lg btn-primary">Cerrar</button></a>
            <button type="submit" class="btn btn-lg btn-primary ml-2">Enviar</button>
        </div>
    </div>
</div>
<!-------FIN BLOQUE 03 -------------->
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
