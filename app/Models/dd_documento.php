<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class dd_documento
 * @package App\Models
 * @version March 25, 2020, 2:28 pm CST
 *
 * @property \App\Models\CsStatus idstatus
 * @property \App\Models\CiTabla idtabla
 * @property \App\Models\CsTipodoc idtipodoc
 * @property integer idEjercicio
 * @property integer id
 * @property integer idTabla
 * @property string doc
 * @property string numero
 * @property integer idTipoDoc
 * @property integer idStatus
 * @property string|\Carbon\Carbon fecha
 * @property string comentario
 * @property integer idUsuario
 * @property boolean b_estado
 */
class dd_documento extends Model
{

    public $table = 'dd_documento';
    

    protected $primaryKey = 'idDocumento';

    public $fillable = [
        'idEjercicio',
        'id',
        'idTabla',
        'doc',
        'numero',
        'idTipoDoc',
        'idStatus',
        'fecha',
        'comentario',
        'idUsuario',
        'b_estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idEjercicio' => 'integer',
        'idDocumento' => 'integer',
        'id' => 'integer',
        'idTabla' => 'integer',
        'doc' => 'string',
        'numero' => 'string',
        'idTipoDoc' => 'integer',
        'idStatus' => 'integer',
        'fecha' => 'datetime',
        'comentario' => 'string',
        'idUsuario' => 'integer',
        'b_estado' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'idTabla' => 'required',
        'b_estado' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idstatus()
    {
        return $this->belongsTo(\App\Models\CsStatus::class, 'idStatus');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idtabla()
    {
        return $this->belongsTo(\App\Models\CiTabla::class, 'idTabla');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idtipodoc()
    {
        return $this->belongsTo(\App\Models\CsTipodoc::class, 'idTipoDoc');
    }
}
