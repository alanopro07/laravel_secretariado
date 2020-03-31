@extends('layouts.siass_layout')

@section('carga_reporte')


        {{ Form::open(array('url' => 'carga_datos_pdf', 'method' => 'post' , 'accept-charset' =>"UTF-8",'enctype' => 'multipart/form-data'))  }}

    @csrf

<page footer="page" pageset='new' backtop='10mm' backbottom=15mm' backleft='5mm' backright='15mm' style="font-size: 12px; ">

    <div class="container ">
        <div class="row ">
        
            <div class="col-md-12 bg-light pt-2">
                <button type="submit"  class="btn btn-primary btn-block"> Informe Trimestarl</button>
            </div>

            <div class="col-md-12 bg-light">
                <div class="form-group">
                    <label>Año del ejercicio</label>
                        @foreach($ejercicios as $ejercicio)
                        <input type="text" class="form-control"  name="anio_fiscal" value="{{$ejercicio->ejercicio}}" id="{{$ejercicio->idEjercicio}}" readonly>
                        @endforeach
                </div>
                <div class="form-group">
                    <label>Nombre del Subsidio</label>
                    <select class="browser-default custom-select estado" name="subsidio" id="subsidio" required>
                        <option value="">Selecciona Subsidio</option>
                        @foreach($subsidios as $subsidio)
                            <option value="{{$subsidio->idSubsidio}}">{{$subsidio->nombreLargo}}</option>
                        @endforeach
                    </select>
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
                        <input type="text" class="form-control"  name="municipio" value="{{$municipio->idMunicipio}}" id="{{$municipio->idMunicipio}}" readonly>
                        <input type="hidden" class="form-control"  name="municipio_nombre" value="{{$municipio->municipio}}" id="{{$municipio->idMunicipio}}" readonly>
                    @endforeach

                </div>

                <div class="form-group">
                    <label>Informe Trimestral</label>
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

                            <h1>Responsable de la Firma de los Informes Trimestrales</h1>
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
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Cargo del Responsable">
                                </div>
                            </div>

                            <div class="col-md-12 bg-light">
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInputGroup">Montos</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Montos $</div>
                                        </div>
                                        
                                        <input type="text" class="browser-default custom-select number_moneda"  name="monto_ministrado"   value="$ {{$monto_elegibilidad}}" id="monto_ministrado" placeholder="Monto ministrado">


                                        <input type="text" class="browser-default custom-select number_moneda"  name="monto"  value="$ {{$monto_ministracion}}" id="monto_no_ministrado" placeholder="Monto no ministrado">
                                    </div>
                                </div>

                                <div class="col-md-12 bg-light pt-2">
                                    <button type="submit" class="btn btn-lg btn-primary"><i class="fas fa-download"></i> Generar formato de descarga</button>
                                </div>

                                {{ Form::close() }}

                                {{ Form::open(array('url' => 'carga_pdf_final', 'method' => 'post' , 'accept-charset' =>"UTF-8",'enctype' => 'multipart/form-data'))  }}


                                <div class="custom-file">
                                    <input type="file"  accept="application/pdf" class="custom-file-input" id="reporte_pdf"  name="reporte_pdf">
                                    <label class="custom-file-label" for="validatedCustomFile"><i class="fa fa-floppy-o" aria-hidden="true"></i> Adjuntar y Guardar</label>
                                </div>
                                <div class="col-md-12 bg-light pt-2">
                                   
                                    <button type="submit" class="btn btn-lg btn-primary"><i class="fas fa-save"></i> Adjuntar y Guardar</button>
                                </div>
                                

                                {{ Form::close() }}
                            </div>
                        </div>
                       
@endsection