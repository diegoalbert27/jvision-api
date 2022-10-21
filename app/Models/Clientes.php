<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'tab_cliente';

    protected $fillable = [
        'cod_cli',
        'nac_cli',
        'ced_cli',
        'nom_cli',
        'ape_cli',
        'fec_nac',
        'dir_cli',
        'ciu_cli',
        'est_cli',
        'tel_cli',
        'cel_cli',
        'cor_cli',
        'por_cli',
        'ret_iva',
        'ret_islr',
        'tip_cli',
        'lis_cli',
        'web_cli',
        'pat_cli'
    ];

    public $timestamps = false;
}
