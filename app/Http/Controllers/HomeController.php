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


        $builder = DB::table('dd_documento')
            ->select('idDocumento','idStatus','idTipoDoc')
            ->where('idUsuario',Auth::user()->idUsuario)
            ->where('idStatus',dd_documento::documento_observaciones)
            ->get();


        //mensaje de bienvenida
        toast('Bienvenid@ '.Auth::user()->login.'!','success');
        return view('layouts.siass_layout')->with(['builder'=>$builder]);
    }

}
