<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class estadoModel
 * @package App\Models
 * @version March 26, 2020, 12:09 am CST
 *
 * @property \App\Models\Region idregion
 * @property \Illuminate\Database\Eloquent\Collection municipios
 * @property \Illuminate\Database\Eloquent\Collection usuarioEstados
 * @property integer idRegion
 * @property string estado
 * @property string abreviatura
 */
class estadoModel extends Model
{

    public $table = 'estado';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    protected $primaryKey = 'idEstado';

    public $fillable = [
        'idRegion',
        'estado',
        'abreviatura'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idRegion' => 'integer',
        'idEstado' => 'integer',
        'estado' => 'string',
        'abreviatura' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'idRegion' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idregion()
    {
        return $this->belongsTo(\App\Models\Region::class, 'idRegion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function municipios()
    {
        return $this->hasMany(\App\Models\municipioModel::class, 'idEstado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function usuarioEstados()
    {
        return $this->hasMany(\App\Models\UsuarioEstado::class, 'idEstado');
    }
}
