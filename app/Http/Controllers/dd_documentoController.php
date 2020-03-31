<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\dd_documento;
use App\Models\estadoModel;
use App\Models\municipioModel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class dd_documentoController extends Controller
{
    const tipo_doc16 = 16;
    const tipo_doc17 = 17;
    const tipo_doc18 = 18;
    const tipo_doc19 = 19;



    public function mostrarReportes()
    {

        $numero=0;
        $documentos = DB::table('dd_documento')
            ->leftJoin('informetrimestral','informetrimestral.idDocumento','=','dd_documento.idDocumento')
            ->leftJoin('municipio','municipio.idMunicipio','=','informetrimestral.idMunicipio')
            ->leftJoin('estado','estado.idEstado','=','municipio.idEstado')
            ->leftJoin('cs_status','cs_status.idStatus','=','dd_documento.idStatus')
            ->select('dd_documento.idDocumento','estado.estado','municipio.municipio','cs_status.status','dd_documento.doc')
            ->whereIn('dd_documento.idTipoDoc',[self::tipo_doc16,self::tipo_doc17,self::tipo_doc18,self::tipo_doc19])
            ->where('dd_documento.idStatus',10)
            ->paginate(10);


        return  view('visualizacion_reportes_trimestrales')->with(['documentos'=>$documentos,'numero'=>$numero]);
    }

    public function formularioReporte()
    {
        $id_usuario = Auth::user()->idRol;
        $subsidios = DB::table('subsidio')->select('idSubsidio','nombreLargo')->where('idSubsidio',1)->get();
        $ejercicios = DB::table('ejercicio')->select('idEjercicio','ejercicio')->where('idEjercicio',1)->get();
        $trimestres = DB::table('ci_trimestres')->select('*')->get();

        //montos ministrados

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

        $municipio_id = $municipios[0]->idMunicipio;

        $query_osiris = DB::select(DB::raw("SELECT  ele.monto as montoElegibilidad 
                                                    FROM usuario LEFT JOIN usuario_municipio on usuario.idUsuario = usuario_municipio.idUsuario 
                                                    LEFT JOIN usuario_estado on usuario.idUsuario = usuario_estado.idEstado 
                                                    INNER JOIN municipio mun on mun.idMunicipio = usuario_municipio.idMunicipio 
                                                    INNER JOIN estado edo on edo.idEstado = mun.idEstado INNER JOIN ministracion min on min.idMunicipio = mun.idMunicipio 
                                                    INNER JOIN elegibilidad ele on ele.idMunicipio = mun.idMunicipio 
                                                    WHERE usuario.idRol='$id_usuario'
                                                    AND usuario_municipio.idMunicipio ='$municipio_id' "));


        return view('carga_reporte')->with([
            'estados'=>$estados,
            'municipios'=>$municipios,
            'subsidios'=>$subsidios,
            'ejercicios'=>$ejercicios,
            'trimestres'=>$trimestres,
            'monto_elegilibilidad'=> $query_osiris[0]->montoElegibilidad,
            'status' => false
        ]);
    }

    public function descargarPdf(Request $request)
    {
        $id_municipio = $request->all()['municipio'];

        $input = $request->all();

            $sql = DB::select(DB::raw("SELECT programa.programa, subprograma.subprograma, FORMAT(IFNULL(rep.SUM,0), 2) as SUM FROM `subprograma`
                                                LEFT JOIN 
                                                    (SELECT bien.idSubprog, SUM(concertacion.costoTotal) as SUM FROM `concertacion` 
                                                    LEFT JOIN bien on concertacion.idBien=bien.idBien
                                                    LEFT JOIN programa on bien.idPrograma=programa.idPrograma
                                                    LEFT JOIN subprograma on bien.idSubprog=subprograma.idSubprograma
                                                    WHERE concertacion.b_estado=1 AND concertacion.idMunicipio='$id_municipio' 
                                                    AND subprograma.idSubprograma<>13
                                                    GROUP BY bien.idPrograma, bien.idSubprog) as rep
                                                on subprograma.idSubprograma=rep.idSubprog
                                                LEFT JOIN programa on subprograma.idPrograma=programa.idPrograma
                                                ORDER BY subprograma.idPrograma ASC, subprograma.numSubprograma ASC"));



           $pdf = PDF::loadView('reportes.reporte_pdf',['input'=>$input,'datos'=>$sql]);
           $pdf->setPaper('a3','landscape');
        return $pdf->download('formato_trimestral.pdf');



    }


    public function cargaDatos(Request $request)
    {

        $input = $request->all();

        $id_usuario = Auth::user()->idRol;

        $ob = (object)$input;

        $ruta = $ob->reporte_pdf->store('public/reporte_trimestral');

        $municipios = DB::table('usuario_municipio')
            ->leftJoin('municipio','municipio.idMunicipio','=','usuario_municipio.idMunicipio')
            ->leftJoin('estado','estado.idEstado','=','municipio.idEstado')
            ->select('municipio.idMunicipio','municipio.municipio')
            ->where('usuario_municipio.idUsuario',Auth::user()->idUsuario)->get()->toArray();

        $municipio_id = $municipios[0]->idMunicipio;

        $query_osiris = DB::select(DB::raw("SELECT  ele.monto as montoElegibilidad 
                                                    FROM usuario LEFT JOIN usuario_municipio on usuario.idUsuario = usuario_municipio.idUsuario 
                                                    LEFT JOIN usuario_estado on usuario.idUsuario = usuario_estado.idEstado 
                                                    INNER JOIN municipio mun on mun.idMunicipio = usuario_municipio.idMunicipio 
                                                    INNER JOIN estado edo on edo.idEstado = mun.idEstado INNER JOIN ministracion min on min.idMunicipio = mun.idMunicipio 
                                                    INNER JOIN elegibilidad ele on ele.idMunicipio = mun.idMunicipio 
                                                    WHERE usuario.idRol='$id_usuario'
                                                    AND usuario_municipio.idMunicipio ='$municipio_id' "));

        //query
        DB::beginTransaction();
        DB::table('dd_documento')
            ->insert([
                'idEjercicio' =>1,
                'doc'=>$ruta,
                'idTipoDoc'=>16,
                'idTabla'=> 1200,
                'idStatus' => dd_documento::documento_enviado,
                'fecha'=> Carbon::now(),
                'idUsuario' => Auth::user()->idUsuario,
                'b_estado'=> 1
            ]);

        $id_documento = $id = DB::getPdo()->lastInsertId();


        DB::table('informetrimestral')
            ->insert([
               'idDocumento'=> $id_documento,
                'idTipoDoc'=>16,
                'idMunicipio'=> $municipios[0]->idMunicipio,
                'paterno'=> Auth::user()->apellidoPaterno,
                'materno'=> Auth::user()->apellidoMaterno,
                'nombres'=> Auth::user()->nombre,
                'cargo'=> Auth::user()->cargo,
                'fecha_carga'=> Carbon::now()

            ]);
        DB::commit();

        return redirect('dashboard');

        //guardado de datos


    }


    //rechazar reporte
    public function rechazarReporte(Request $request)
    {
        $comentario = $request->all()['comentario'];
        $input = $request->all();
        $id_documeto = $input['respuesta_documento'];

        //update documento

        DB::beginTransaction();

        DB::table('dd_documento')
            ->where('idDocumento',$id_documeto)
            ->update(['idStatus'=>dd_documento::documento_observaciones,
                      'comentario'=>$comentario
                    ]);
        DB::commit();


        return redirect('visualizar_reportes_trimestrales');

    }

    //aceptar reporte
    public function aceptarReporte(Request $request)
    {
        $input = $request->all();
        $id_documeto = $input['respuesta'];

        //update documento

        DB::beginTransaction();

        DB::table('dd_documento')
            ->where('idDocumento',$id_documeto)
            ->update([
                'idStatus'=>dd_documento::documento_aprobado,
                ]);
        DB::commit();

        return redirect('visualizar_reportes_trimestrales');

    }

}
