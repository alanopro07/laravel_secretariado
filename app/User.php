<?php

namespace App;

use App\Notifications\resetPasswordNotificationEspañol;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    //constantes para el status del usuario
    const ESTATUS_ACTIVO = 1;
    const ESTATUS_INACTIVO = 0;
    protected $table = 'usuario';

    protected $primaryKey = 'idUsuario';
    /**
     *
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'email', 'password','login','clave','apellidoMaterno'
        ,'apellidoPaterno','titulo','telefono','extension','celular',
        'status','fechaUltVisita','comentario','foto','cargo','dependencia',
        'direccion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

}
