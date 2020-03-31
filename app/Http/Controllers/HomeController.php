<?php

namespace App\Http\Controllers;
use App\Repositories\usuarioModelRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\rolModel;
use App\Models\dd_documento;
use Illuminate\Support\Facades\Auth;
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

        $idRol = Auth::user()->idRol;

        $builder1 = DB::table('dd_documento')
            ->select('idDocumento','idStatus','idTipoDoc')
            ->where('idUsuario',Auth::user()->idUsuario)
            ->where('idStatus',dd_documento::documento_aprobado)
            ->get();

        $builder2 = DB::table('dd_documento')
            ->select('idDocumento','idStatus','idTipoDoc')
            ->where('idUsuario',Auth::user()->idUsuario)
            ->where('idStatus',dd_documento::documento_enviado)
            ->get();

        $builder3 = DB::table('dd_documento')
            ->select('idDocumento','idStatus','idTipoDoc')
            ->where('idUsuario',Auth::user()->idUsuario)
            ->where('idStatus',dd_documento::documento_observaciones)
            ->get();

        if(!$builder1->isEmpty() && Auth::user()->idRol == 31 || Auth::user()->idRol == 32)
        {
            toast('El usuario '.Auth::user()->login.' ya tiene documentos aprobados','success');
            return view('layouts.layouts_aprobados')->with(['mensaje'=> 'Tienes documentos aprobados']);
        }
        if(!$builder2->isEmpty() && Auth::user()->idRol == 31 || Auth::user()->idRol == 32)
        {
            toast('El usuario '.Auth::user()->login.' el reporte se esta verificando','success');
            return view('layouts.layouts_aprobados')->with(['mensaje'=> 'Los documentos que se enviaron se estan verificando , se dara una respuesta pronto']);
        }
        if(!$builder3->isEmpty() && Auth::user()->idRol == 31 || Auth::user()->idRol == 32)
        {
            toast('El reporte de  el usuario: '.Auth::user()->login.' tuvo errores <br> Favor de verificarlo','error');
            return view('layouts.siass_layout');

        }

        //mensaje de bienvenida
        toast('Bienvenid@ '.Auth::user()->login.'!','success');
        return view('layouts.siass_layout');
    }

}
