<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_articulos', function (Blueprint $table) {
            $table->string('cod_art', 14)->primary();
            $table->string('cod_ref', 10);
            $table->string('tip_art', 2);
            $table->string('gru_art', 10);
            $table->double('fab_art', 20, 2);
            $table->string('nom_art', 60);
            $table->double('pvp_art', 20, 2);
            $table->decimal('sto_min');
            $table->string('cod_prv', 5);
            $table->boolean('act_art');
            $table->string('tip_vis', 3);
            $table->decimal('esf_art', 6);
            $table->decimal('cil_art', 6);
            $table->decimal('dia_art', 3, 0);
            $table->decimal('add_art', 5);
            $table->decimal('bas_art', 5);
            $table->string('ojo_art', 1);
            $table->string('tip_mat', 12);
            $table->double('cos_art');
            $table->double('div_art');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tab_articulos');
    }
}
