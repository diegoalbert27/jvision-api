<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'tab_factura';

    protected $fillable = [
        'cod_fac',
        'fec_fac',
        'cli_fac',
        'tip_fac',
        'tie_cre',
        'fec_ven',
        'ord_fac',
        'sta_fac',
        'anu_fac',
        'fec_anu',
        'sub_tot',
        'bas_fac',
        'por_des',
        'des_fac',
        'val_iva',
        'iva_fac',
        'tot_fac',
        'obs_fact',
        'pre_fact',
        'mod_fac',
        'num_con',
        'web_fac',
        'imp_fac',
        'fac_fis',
        'usu_fac',
        'dol_fac',
    ];

    public $timestamps = false;
}
