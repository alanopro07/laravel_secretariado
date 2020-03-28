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
                <th scope="col" class="text-center">Accion</th>

            </tr>
            </thead>
            <tbody>
            @foreach($documentos as $documento)
            <tr>
                <th>{{$numero=$numero+1}}</th>
                <td>{{$documento->estado}}</td>
                <td>{{$documento->municipio}}</td>
                <td>{{$documento->status}}</td>
                <td class="text-center"><a href="{{Storage::url($documento->doc)}}" class="a-ginda_link" target="_blank" >DescargarPDF</a></td>

            </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-12 bg-light d-flex justify-content-end">
                <button class="btn btn-lg btn-primary ml-2">Cancelar</button>
            </div>
        </div>
    </div>
@endsection
