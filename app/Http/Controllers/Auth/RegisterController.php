<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'login' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:1', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $ob = collect();
        $pass = $data['password'];

        $ob = (object)$data;
        $ruta = $ob->archivo_imagen_usuario->store('public/avatar');

        $builder =  User::create([
            'nombre' => $data['name'],
            'apellidoPaterno' => $data['apellido_paterno'],
            'apellidoMaterno' => $data['apellido_materno'],
            'telefono'=> $data['telefono'],
            'cargo'=> $data['cargo'],
            'dependencia'=> $data['dependencia'],
            'email' => $data['email'],
            'login' => $data['login'],
            'foto'=>$ruta,
            'password' => Hash::make($data['password']),
            'status' => User::ESTATUS_ACTIVO,
        ]);
        //se hace un update para el llenado de clave en la tabla usuario mediante el id
        $id = DB::getPdo()->lastInsertId();
        DB::table('usuario')->where('idUsuario',$id)
            ->update(['clave'=> DB::raw('AES_ENCRYPT("'.$pass.'",nombre) ')]);
        return $builder;

    }
}
