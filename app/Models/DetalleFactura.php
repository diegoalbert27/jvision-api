<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    protected $table = 'tab_detfac';

    protected $fillable = [
        'cod_dfac',
        'fac_dfac',
        'art_dfac',
        'can_dart',
        'pre_dfac',
        'ord_dfac',
        'ped_dfac'
    ];

    public $timestamps = false;
}
