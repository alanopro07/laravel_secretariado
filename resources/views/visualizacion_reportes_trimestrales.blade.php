@extends('layouts.siass_layout')

@section('visualizar_reportes')
    <div class="container">
        <table class="table mt-5">
            <thead class="thead-light">
            <tr>
                <th scope="col">#No.</th>
                <th scope="col">Estado</th>
                <th scope="col">Beneficiario</th>
                <th scope="col">Estatus</th>
                <th scope="col" class="text-center">Descargar</th>
                <th scope="col" class="text-center">Aceptar</th>
                <th scope="col" class="text-center">Recazar</th>



            </tr>
            </thead>
            {{$documentos->total()}} registros | pagina {{$documentos->currentPage()}} de {{$documentos->lastPage()}}
            <tbody>
            @foreach($documentos as $documento)
            <tr>
                <th>{{$numero=$numero+1}}</th>
                <td>{{$documento->estado}}</td>
                <td>{{$documento->municipio}}</td>
                <td>{{$documento->status}}</td>
                <td class="text-center"><a href="{{Storage::url($documento->doc)}}" type="button" class="btn btn-primary" download="Reporte_trimestral{{$documento->estado}}">DescargarPDF</a></td>
                <td style="width: 10px">

                    {!! Form::open(['route' => ['aceptar'], 'method' => 'post']) !!}
                    <input type="hidden" name="respuesta" value="{{$documento->idDocumento}}" readonly>

                    <button  type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalAceptar" ><i class="far fa-check-square" style="font-size: 20px"></i></button>

                    {!! Form::close() !!}
                </td>
                <td style="width: 10px">
                    {!! Form::open(['route' => ['rechazar'], 'method' => 'post']) !!}
                    <button  type="button"   class="btn btn-primary" data-toggle="modal" data-target="#modalRechazo"><i class="far fa-times-circle" style="font-size: 20px"></i></button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalRechazo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center" id="exampleModalLabel">Motivo de rechazo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body d-flex justify-content-center">
                                    <input type="hidden" name="respuesta_documento" value="{{$documento->idDocumento}}" readonly>
                                    <textarea class="text-center" name="comentario" id="comentario" cols="30" rows="10"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </td>
            </tr>

            @endforeach

            </tbody>
        </table>



        {!! $documentos->render() !!}

        <div class="row">
            <div class="col-md-12 bg-light d-flex justify-content-end">
                <a href="{{url('dashboard')}}"><button class="btn btn-lg btn-primary ml-2" >Regresar</button></a>

            </div>
        </div>
    </div>

@endsection
