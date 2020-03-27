@extends('layouts.siass_layout')

@section('carga_reporte')

    {{ Form::open(array('url' => 'carga_reporte_trimestral', 'method' => 'post' , 'accept-charset' =>"UTF-8",'enctype' => 'multipart/form-data'))  }}

    <div class="container ">
        <div class="row ">
            <div class="col-md-12 bg-light pt-2">
                <button type="submit"  class="btn btn-primary btn-block"><i class="fa fa-eye" aria-hidden="true"></i> Ver Archivo</button>
            </div>

            <div class="col-md-12 bg-light">
                <div class="form-group">
                    <label>Año del ejercicio</label>
                    <select class="browser-default custom-select estado" name="ejercicio" id="ejercicio" >
                        <option value="0">Selecciona año</option>
                        @foreach($ejercicios as $ejercicio)
                            <option value="{{$ejercicio->idEjercicio}}">{{$ejercicio->ejercicio}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Nombre del Subsidio</label>
                    <select class="browser-default custom-select estado" name="subsidio" id="subsidio" >
                        <option value="0">Selecciona Subsidio</option>
                        @foreach($subsidios as $subsidio)
                            <option value="{{$subsidio->idSubsidio}}">{{$subsidio->nombreLargo}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Entidad Federativa</label>
                    <select class="browser-default custom-select estado" name="estado" id="estado" >
                        <option value="0">Selecciona Entidad Federativa</option>
                        @foreach($estados as $estado)
                        <option value="{{$estado->idEstado}}">{{$estado->estado}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Delegacion/Municipio</label>
                    <select class="browser-default custom-select municipio" name="municipio" id="municipio" >
                        <option value="0">Selecciona Delegacion/Municipio</option>
                        @foreach($municipios as $municipio)
                        <option value="{{$municipio->idMunicipio}}">{{$municipio->municipio}}</option>
                        @endforeach()
                    </select>
                </div>

                <div class="form-group">
                    <label>Informe Trimestral</label>
                    <select class="browser-default custom-select" name="trimestre" id="trimestre" >
                        <option value="0">Selecciona Informe Trimestral</option>
                        @foreach($trimestres as $trimestre)
                            <option value="{{$trimestre->idci_trimestres}}">{{$trimestre->fInicio}} - {{$trimestre->fFin}}</option>
                        @endforeach()
                    </select>
                </div>


                <div class="container d-flex mt-5 justify-content-center align-items-center rounded bg-light shadow-lg ">
                    <div class="row text-center">
                        <div class="col-md-12">

                            <h3 class=" .invalid-feedback  ">Responsable de la firma de los Informes Trimestrales</h3>
                        </div>
                        <div class="col-md-12 bg-light">
                            <div class="col-auto">
                                <label class="sr-only" for="inlineFormInputGroup">Nombre Completo</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Nombre Completo</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Nombre">
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Primer Apellido">
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Segundo Apellido">
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
                                            <div class="input-group-text">Montos</div>
                                        </div>
                                        <select class="browser-default custom-select" name="institucion_bancaria" id="institucion_bancaria" >
                                            <option value="0">Monto Ministrado</option>
                                            <option value="1"></option>
                                            <option value="2"></option>

                                        </select>
                                        <select class="browser-default custom-select" name="institucion_bancaria" id="institucion_bancaria" >
                                            <option value="0">Monto no Ministrado</option>
                                            <option value="1"></option>
                                            <option value="2"></option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 bg-light pt-2">
                                    <a href="{{route('descarga_formato')}}"><button type="button" class="btn btn-lg btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Descargar Formato</button></a>

                                </div>
                                <div class="custom-file">
                                    <input type="file"  accept="application/pdf" class="custom-file-input" id="validatedCustomFile" required>
                                    <label class="custom-file-label" for="validatedCustomFile"><i class="fa fa-floppy-o" aria-hidden="true"></i> Adjuntar y Guardar</label>
                                </div>
                                <div class="col-md-12 bg-light pt-2">
                                    <a href="{{url('dashboard')}}"> <button type="text" class="btn btn-lg btn-primary">Regresar</button></a>
                                    <button type="submit" class="btn btn-lg btn-primary">Enviar</button>
                                </div>

                            </div>
                        </div>



@endsection