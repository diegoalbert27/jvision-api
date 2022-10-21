<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tab_tipoart';

    protected $fillable = [
        'cod_tip',
        'nom_tip',
        'inv_tip',
        'ven_tip',
        'iva_tip'
    ];

    public $timestamps = false;
}
