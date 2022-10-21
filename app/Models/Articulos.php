<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulos extends Model
{
    protected $table = 'tab_articulos';

    protected $fillable = [
        'cod_art',
        'cod_ref',
        'tip_art',
        'gru_art',
        'fab_art',
        'nom_art',
        'pvp_art',
        'sto_min',
        'cod_prv',
        'act_art',
        'tip_vis',
        'esf_art',
        'cil_art',
        'dia_art',
        'add_art',
        'bas_art',
        'ojo_art',
        'tip_mat',
        'cos_art',
        'div_art'
    ];

    public $timestamps = false;
}
