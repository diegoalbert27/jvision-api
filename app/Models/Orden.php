<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'tab_orden';

    protected $fillable = [
        'cod_ord',
        'ced_ord',
        'fec_ord',
        'hra_ord',
        'ped_ord',
        'tmo_ord',
        'hor_ord',
        'ver_ord',
        'max_ord',
        'pue_ord',
        'obs_ord',
        'usu_ord',
        'est_ord',
        'est_ord2',
        'caj_ord',
        'fde_ord',
        'num_fact',
        'fec_fact',
        'sub_fact',
        'bas_ord',
        'val_iva',
        'iva_fact',
        'por_des',
        'des_fact',
        'tot_fact',
        'lab_ord',
        'web_ord',
        'pat_ord',
        'mon_pat',
        'est_pat',
        'med_ord',
        'obs_sta'
    ];

    public $timestamps = false;
}
