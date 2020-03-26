<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dd_documento;
use App\Models\estadoModel;
use App\Models\municipioModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class dd_documentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function mostrarReportes()
    {
        $mostrar = dd_documento::all();
//        dd($mostrar->pluck('idUsuario'));
        return  view('visualizacion_reportes_trimestrales');
    }

    public function formularioReporte()
    {
        $subsidios = DB::table('subsidio')->select('idSubsidio','nombreLargo')->where('idSubsidio',1)->get();
        $ejercicios = DB::table('ejercicio')->select('idEjercicio','ejercicio')->where('idEjercicio',1)->get();
        $trimestres = DB::table('ci_trimestres')->select('*')->get();

        $estados =  DB::table('usuario_municipio')
            ->leftJoin('municipio','municipio.idMunicipio','=','usuario_municipio.idMunicipio')
            ->leftJoin('estado','estado.idEstado','=','municipio.idEstado')
            ->select('estado.idEstado','estado.estado')
            ->where('usuario_municipio.idUsuario',Auth::user()->idUsuario)->get()->toArray();

        $municipios = DB::table('usuario_municipio')
            ->leftJoin('municipio','municipio.idMunicipio','=','usuario_municipio.idMunicipio')
            ->leftJoin('estado','estado.idEstado','=','municipio.idEstado')
            ->select('municipio.idMunicipio','municipio.municipio')
            ->where('usuario_municipio.idUsuario',Auth::user()->idUsuario)->get()->toArray();

        return view('carga_reporte')->with([
            'estados'=>$estados,
            'municipios'=>$municipios,
            'subsidios'=>$subsidios,
            'ejercicios'=>$ejercicios,
            'trimestres'=>$trimestres
        ]);
    }

    public function descargarPlantilla()
    {
       return Storage::disk('storage_plantilla')->download('Informe_trimestral_platilla.pdf');

    }

    public function municipios_de_estado(Request $request)
    {
        $all = $request->all();
        dd($all);
    }
}
