@extends('layouts.siass_layout')

@section('carga_reporte')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12 bg-light pt-2">
                <button type="submit"  class="btn btn-primary btn-block"><i class="fa fa-eye" aria-hidden="true"></i> Ver Archivo</button>
            </div>

            <div class="col-md-12 bg-light">
                <div class="form-group">
                    <label>Ejercicio Fiscal</label>
                    <input type="text"  class="form-control"  id="Ejercicio Fiscal" name="Ejercicio Fiscal" value="" placeholder="Ingresar 	Ejercicio Fiscal" >
                </div>
                <div class="form-group">
                    <label>Nombre del Subsidio</label>
                    <input type="text"  class="form-control"  id="Nombre del Subsidio" name="Nombre del Subsidio" value="" placeholder="Ingresar 	Nombre del Subsidio" >
                </div>
                <div class="form-group">
                    <label>Entidad Federativa</label>
                    <select class="browser-default custom-select estado" name="estado" id="estado" >
                        <option value="0">Selecciona Entidad Federativa</option>
                        <option value=""></option>

                    </select>
                </div>
                <div class="form-group">
                    <label>Delegacion/Municipio</label>
                    <select class="browser-default custom-select municipio" name="municipio" id="municipio" >
                        <option value="0">Selecciona Delegacion/Municipio</option>
                        <option value="1"></option>
                        <option value="2"></option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Informe Trimestral</label>
                    <select class="browser-default custom-select" name="institucion_bancaria" id="institucion_bancaria" >
                        <option value="0">Selecciona Informe Trimestral</option>
                        <option value="1"></option>
                        <option value="2"></option>

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
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Primer Apellido">
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Primer Apellido">
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Primer Apellido">
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
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                    <label class="custom-file-label" for="validatedCustomFile"><i class="fa fa-floppy-o" aria-hidden="true"></i> Adjuntar y Guardar</label>
                                </div>
                                <div class="col-md-12 bg-light pt-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Enviar</button>
                                    <button type="submit" class="btn btn-lg btn-primary">Enviar</button>
                                </div>

                            </div>
                        </div>



@endsection