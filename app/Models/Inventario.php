<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'tab_inventario';

    protected $fillable = [
        'cod_inv',
        'alm_inv',
        'art_inv',
        'can_inv'
    ];

    public $timestamps = false;
}
