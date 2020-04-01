<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class municipioModel
 * @package App\Models
 * @version March 26, 2020, 12:24 am CST
 *
 * @property \App\Models\Estado idestado
 * @property \Illuminate\Database\Eloquent\Collection concertacions
 * @property \Illuminate\Database\Eloquent\Collection elegibilidads
 * @property \Illuminate\Database\Eloquent\Collection evaluacionbds
 * @property \Illuminate\Database\Eloquent\Collection usuarioMunicipios
 * @property integer idEstado
 * @property integer idMun
 * @property string municipio
 */
class municipioModel extends Model
{

    public $table = 'municipio';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    protected $primaryKey = 'idMunicipio';

    public $fillable = [
        'idEstado',
        'idMun',
        'municipio'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idEstado' => 'integer',
        'idMun' => 'integer',
        'idMunicipio' => 'integer',
        'municipio' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'idEstado' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idestado()
    {
        return $this->belongsTo(\App\Models\Estado::class, 'idEstado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function concertacions()
    {
        return $this->hasMany(\App\Models\Concertacion::class, 'idMunicipio');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function elegibilidads()
    {
        return $this->hasMany(\App\Models\Elegibilidad::class, 'idMunicipio');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function evaluacionbds()
    {
        return $this->hasMany(\App\Models\Evaluacionbd::class, 'idMunicipio');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function usuarioMunicipios()
    {
        return $this->hasMany(\App\Models\UsuarioMunicipio::class, 'idMunicipio');
    }
}
