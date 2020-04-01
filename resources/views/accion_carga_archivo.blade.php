{{ Form::open(array('url' => 'carga_pdf_final', 'method' => 'post' , 'accept-charset' =>"UTF-8",'enctype' => 'multipart/form-data'))  }}


<div class="custom-file">
    <input type="file"  accept="application/pdf" class="custom-file-input" id="validatedCustomFile" >
    <label class="custom-file-label" for="validatedCustomFile"><i class="fa fa-floppy-o" aria-hidden="true"></i> Adjuntar y Guardar</label>
</div>
<div class="col-md-12 bg-light pt-2">
    <a href="{{url('dashboard')}}" class="btn btn-lg btn-primary"  style="color: white">Regresar</a>
    <button type="submit" class="btn btn-lg btn-primary">Enviar</button>
</div>