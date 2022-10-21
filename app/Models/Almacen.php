<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    protected $table = 'tab_almacen';

    protected $fillable = [
        'cod_alm',
        'nom_alm',
        'ubi_alm',
        'ven_alm'
    ];

    public $timestamps = false;
}
