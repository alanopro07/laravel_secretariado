@extends('layouts.siass_layout')

@section('carga_reporte')



    @csrf
    <div class="container ">
        <div class="row text-center ">
        
            <div class="col-md-12 bg-light pt-2">
                <a target="_blankw">  <button class="btn btn-primary btn-block">Informe Trimestral</button></a>
            </div>
            {{ Form::open(array('url' => 'carga_datos_pdf', 'method' => 'post' , 'accept-charset' =>"UTF-8",'enctype' => 'multipart/form-data'))  }}

            <div class="col-md-12 bg-light">
                <div class="form-group">
                    <label>Año del ejercicio</label>
                        @foreach($ejercicios as $ejercicio)
                        <input type="text" class="form-control"  name="anio_fiscal" value="{{$ejercicio->ejercicio}}" id="{{$ejercicio->idEjercicio}}" readonly>
                        @endforeach
                </div>
                <div class="form-group">
                    <label>Nombre del Subsidio</label>
                        @foreach($subsidios as $subsidio)
                            <input type="text" class="form-control"  name="{{$subsidio->nombreLargo}}" value="{{$subsidio->nombreLargo}}" id="{{$ejercicio->idEjercicio}}" readonly>
                        @endforeach
                </div>
                <div class="form-group">
                    <label>Entidad Federativa</label>
                    @foreach($estados as $estado)
                        <input type="text" class="form-control"  name="estado" value="{{$estado->estado}}" id="{{$estado->idEstado}}" readonly>
                    @endforeach

                </div>
                <div class="form-group">
                    <label>Delegacion/Municipio</label>
                    @foreach($municipios as $municipio)
                        <input type="text" class="form-control"  name="municipio" value="{{$municipio->municipio}}" id="{{$municipio->idMunicipio}}" readonly>
                        <input type="hidden" class="form-control"  name="municipio_id" value="{{$municipio->idMunicipio}}" id="{{$municipio->idMunicipio}}" readonly>
                    @endforeach

                </div>

                <div class="form-group">
                    <label >Informe Trimestral</label>
                    <select class="browser-default custom-select" name="trimestre" id="trimestre" required >
                        <option value="" >Selecciona Informe Trimestral</option>
                        @foreach($trimestres as $trimestre)
                            <option value="{{$trimestre->fInicio}}-{{$trimestre->fFin}}" name="trimestre" >{{$trimestre->fInicio}} - {{$trimestre->fFin}}</option>
                        @endforeach()
                    </select>
                </div>


                <div class="container d-flex mt-5 justify-content-center align-items-center rounded bg-light shadow-lg ">
                    <div class="row text-center">
                        <div class="col-md-12">

                            <h1 class=" .invalid-feedback  ">Responsable de la Firma de los Informes Trimestrales</h1>
                        </div>
                        <div class="col-md-12 bg-light">
                            <div class="col-auto">
                                <label class="sr-only" for="inlineFormInputGroup">Nombre Completo</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Nombre Completo</div>
                                    </div>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                                    <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" placeholder="Primer Apellido" required>
                                    <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" placeholder="Segundo Apellido" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 bg-light">
                            <div class="col-auto">
                                <label class="sr-only" for="inlineFormInputGroup">Cargo</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Cargo</div>
                                    </div>
                                    <input type="text" name="cargo" class="form-control" id="cargo" placeholder="Cargo del Responsable">
                                </div>
                            </div>


                            <div class="col-md-12 bg-light">
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInputGroup">Montos</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Montos ministrado $</div>
                                        </div>
                                        <input type="text" class="browser-default custom-select number_moneda"  name="monto_ministrado" value="{{$montoministrado}}"  id="monto_ministrado" placeholder="Monto ministrado">

                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Montos no ministrado $</div>
                                        </div>
                                        <input type="text" class="browser-default custom-select number_moneda"  name="monto_no_ministrado" value="{{$montonoministrado}}"  id="monto_no_ministrado" placeholder="Monto no ministrado">
                                    </div>
                                </div>

                                <div class="col-md-12 bg-light pt-2">
                                    <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Generar formato de descarga</button>
                                </div>

                                {{ Form::close() }}

                                {{ Form::open(array('url' => 'carga_pdf_final', 'method' => 'post' , 'accept-charset' =>"UTF-8",'enctype' => 'multipart/form-data'))  }}

                                <div class="custom-file">
                                    <input type="file"  accept="application/pdf" class="custom-file-input" id="reporte_pdf"  name="reporte_pdf" required>
                                    <label class="custom-file-label" for="validatedCustomFile"><i class="fa fa-floppy-o" aria-hidden="true"></i> Adjuntar y Guardar</label>
                                </div>
                                <div class="col-md-12 bg-light pt-2">
                                    
                                    <button type="submit" class="btn btn-lg btn-primary"><i class="fas fa-save"></i> Adjuntar y Guardar</button>
                                </div>

                                {{ Form::close() }}
                            </div>
                        </div>

@endsection
@include('sweetalert::alert')
