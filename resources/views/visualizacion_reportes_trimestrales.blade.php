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
            <tr>
                <th>1</th>
                <td>Aguascalientes</td>
                <td>aguascalientes</td>
                <td>enviado</td>
                <td class="text-center"><a href="" class="a-ginda_link">ver documento</a></td>
            </tr>
            <tr>
                <th>2</th>
                <td>Aguascalientes</td>
                <td>aguascalientes</td>
                <td>enviado</td>
                <td class="text-center"><a href="" class="a-ginda_link">ver documento</a></td>
            </tr>
            <tr>
                <th>3</th>
                <td>Aguascalientes</td>
                <td>aguascalientes</td>
                <td>enviado</td>
                <td class="text-center"><a href="" class="a-ginda_link">ver documento</a></td>
            </tr>
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-12 bg-light d-flex justify-content-end">
                <button class="btn btn-lg btn-primary ml-2">Cancelar</button>
            </div>
        </div>
    </div>
@endsection
