<?php

namespace App\Http\Controllers;
use App\Repositories\usuarioModelRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\rolModel;
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
//        $permisos = DB::table('rol')
//            ->leftJoin('rol_permiso','rol_permiso.idRol','=','rol.idRol')
//            ->leftJoin('permiso','permiso.idPermiso','=','rol_permiso.idPermiso')
//            ->leftJoin('etapa','etapa.idEtapa','=','permiso.idEtapa')
//            ->select('rol.descripcion','etapa.etapa','etapa.descripcion as descricion_etapa','permiso.permiso','permiso.descripcion as permiso_descripcion')
//            ->where('rol.idRol',$idRol)
//            ->get();

        //mensaje de bienvenida
        toast('Bienvenid@ '.Auth::user()->login.'!','success');
        return view('pruebas')->with([
            'texto1'=>'hola desde controlador prueba1',
            'texto2' => 'hola desde controlador prueba2',
            'nombre_seccion'=> 'contenido_pruebas'
            ]);
    }

}
