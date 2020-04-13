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
            ->select('dd_documento.idDocumento','estado.estado','municipio.municipio','dd_documento.fecha','cs_status.idStatus','cs_status.status','dd_documento.doc')
            ->whereIn('dd_documento.idTipoDoc',[self::tipo_doc16,self::tipo_doc17,self::tipo_doc18,self::tipo_doc19])
            ->whereIn('dd_documento.idStatus',[dd_documento::documento_aprobado,dd_documento::documento_observaciones,dd_documento::documento_enviado])
            ->orderBy('dd_documento.fecha','DESC')
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

                $ministrado = DB::select(DB::raw(" SELECT monto*.8 as Ministrado  FROM elegibilidad 
                                                WHERE idMunicipio='$municipio_id'"));
                                                


                $noministrado = DB::select(DB::raw("SELECT  monto*.2 as NoMinistrado  FROM `elegibilidad` 
                                               WHERE idMunicipio ='$municipio_id'"));


                  

                     $Todoministrado = DB::select(DB::raw("SELECT monto as MontoTotalElegibidlida  FROM elegibilidad 
                      WHERE idMunicipio='$municipio_id'"));
                               
                                                


        return view('carga_reporte')->with([
            'estados'=>$estados,
            'municipios'=>$municipios,
            'subsidios'=>$subsidios,
            'ejercicios'=>$ejercicios,
            'trimestres'=>$trimestres,
            'montoministrado'=>number_format($ministrado[0]->Ministrado, 2, '.', ','),
            'montonoministrado'=> number_format($noministrado[0]->NoMinistrado, 2, '.', ','),
 
           'Todoministrado'=>$Todoministrado[0]->MontoTotalElegibidlida,
            'status' => false
        ]);
    }

    public function descargarPdf(Request $request)
    {
        
        
        $id_municipio = $request->all()['municipio_id'];


        $input = $request->all();
        

     
      
       

         $sql = DB::select(DB::raw("SELECT programa.idPrograma, programa.programa, subprograma.subprograma, FORMAT(IFNULL(rep.SUM,0), 2) as SUM, IFNULL(rep.SUM,0) as SUMA FROM `subprograma`
         LEFT JOIN 
             (SELECT programa.idPrograma, bien.idSubprog, SUM(concertacion.costoTotal) as SUM FROM `concertacion` 
             LEFT JOIN bien on concertacion.idBien=bien.idBien
             LEFT JOIN programa on bien.idPrograma=programa.idPrograma
             LEFT JOIN subprograma on bien.idSubprog=subprograma.idSubprograma
             WHERE concertacion.b_estado=1 AND concertacion.idMunicipio=' $id_municipio' AND subprograma.idSubprograma<>13
             GROUP BY programa.idPrograma, bien.idSubprog) as rep
         on subprograma.idSubprograma=rep.idSubprog
         LEFT JOIN programa on subprograma.idPrograma=programa.idPrograma
         WHERE subprograma.idSubprograma<>13
         ORDER BY subprograma.idPrograma ASC, subprograma.numSubprograma ASC"));
    

            $sql1 = DB::select(DB::raw(" SELECT programa.idPrograma, programa.programa, subprograma.subprograma, FORMAT(SUM(concertacion.costoTotal),2) as SUM, SUM(concertacion.costoTotal) AS SUMA FROM `concertacion` 
            LEFT JOIN bien on concertacion.idBien=bien.idBien
            LEFT JOIN programa on bien.idPrograma=programa.idPrograma
            LEFT JOIN subprograma on bien.idSubprog=subprograma.idSubprograma
            WHERE concertacion.b_estado=1 AND concertacion.idMunicipio='$id_municipio' AND subprograma.idSubprograma=13
            GROUP BY programa.idPrograma, programa.programa, subprograma.subprograma"));


                
                $TOTAL = DB::select(DB::raw("SELECT SUM(concertacion.costoTotal) as totalsuma FROM `concertacion` 
                LEFT JOIN bien on concertacion.idBien=bien.idBien
                WHERE concertacion.b_estado=1 AND concertacion.idMunicipio=3 AND bien.idSubprog<>13"));
                 

                            
                    $SUBTOTAL = DB::select(DB::raw("SELECT programa.idPrograma, programa.programa, 
                    FORMAT(IFNULL(rep.SUM,0), 2) as SUM, IFNULL(rep.SUM,0) as SUMA FROM `programa`
                    LEFT JOIN 
                        (SELECT programa.idPrograma, SUM(concertacion.costoTotal) as SUM FROM `concertacion` 
                        LEFT JOIN bien on concertacion.idBien=bien.idBien
                        LEFT JOIN programa on bien.idPrograma=programa.idPrograma
                        WHERE concertacion.b_estado=1 AND concertacion.idMunicipio=' $id_municipio' AND bien.idSubprog<>13
                        GROUP BY programa.idPrograma,bien.idPrograma) as rep
                    on programa.idPrograma=rep.idPrograma
                    ORDER BY programa.idPrograma ASC "));
                  
                    

                   

                $pdf = PDF::loadView('reportes.reporte_pdf',['input'=>$input,'datos'=>$sql,'valores'=>$sql1,'total'=>$TOTAL[0]->totalsuma,'subtotal'=>$SUBTOTAL]);
                $pdf->setPaper('a3','landscape');
                    return $pdf->download('formato_trimestral.pdf');

                  
    }
 

    public function cargaDatos(Request $request)
    {

        $input= $request->all();
        $ob = (object)$input;
       
        

        $municipios = DB::table('usuario_municipio')
            ->leftJoin('municipio','municipio.idMunicipio','=','usuario_municipio.idMunicipio')
            ->leftJoin('estado','estado.idEstado','=','municipio.idEstado')
            ->select('municipio.idMunicipio','municipio.municipio','estado.estado')
            ->where('usuario_municipio.idUsuario',Auth::user()->idUsuario)->get()->toArray();

        $ruta = $ob->reporte_pdf->store('public/seguimiento/informe_trimestral_'.$municipios[0]->estado.'_'.$municipios[0]->municipio.'');


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
        $id_documento = $input['respuesta_documento'];

        //update documento


        DB::beginTransaction();

        DB::table('dd_documento')
            ->where('idDocumento',$id_documento)
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
