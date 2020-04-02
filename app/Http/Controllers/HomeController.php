<?php

namespace App\Http\Controllers;
use App\Repositories\usuarioModelRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\rolModel;
use App\Models\dd_documento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection as Collection;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Object_;
use Illuminate\Contracts\Encryption\DecryptException;


class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $contador = 0;
        $idRol = Auth::user()->idRol;


        $builder = DB::table('dd_documento')
            ->leftJoin('cs_status','cs_status.idStatus','=','dd_documento.idStatus')
            ->leftJoin('cs_tipodoc','cs_tipodoc.idTipoDoc','=','dd_documento.idTipodoc')
            ->select('dd_documento.doc','cs_status.status','dd_documento.comentario','cs_tipodoc.tipoDoc','dd_documento.fecha')
            ->where('dd_documento.idUsuario',Auth::user()->idUsuario)
            ->get();


        //coversion a collec para evaliacion de aprobado en la condicion
        $collection = Collection::make($builder);


        if($collection->pluck('status')->last() == 'Enviado')
        {
            toast(''.Auth::user()->login.'Los documentos se han enviado ','success');
            return view('layouts.layouts_aprobados')->with(['builder'=> $builder,'contador'=>$contador,'status'=>false]);

        }


        if($collection->pluck('status')->last() == 'Aprobado')
        {
            toast('El usuario '.Auth::user()->login.' ya tiene documentos aprobados','success');
            return view('layouts.layouts_aprobados')->with(['builder'=> $builder,'contador'=>$contador,'status'=>false]);
        }

        if($collection->pluck('status')->last() == 'Con observaciones')
        {

            toast('Bienvenid@ '.Auth::user()->login.' Tienes documentos con observaciones','warning');
            return view('layouts.layouts_aprobados')->with(['builder'=> $builder,'contador'=>$contador,'status'=>true]);

        }

        //mensaje de bienvenida
        toast('Bienvenid@ '.Auth::user()->login.'!','success');
        return view('layouts.siass_layout')->with(['status'=>false]);
    }

}
