<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaPago extends Model
{
    use HasFactory;

    protected $table = 'tab_forpag';

    protected $fillable = [
        'cod_for',
        'fac_for',
        'tip_for',
        'mon_for',
        'anu_for',
        'doc_for',
        'ban_for',
        'abo_for',
        'tas_for',
        'dol_for',
    ];

    public $timestamps = false;
}
