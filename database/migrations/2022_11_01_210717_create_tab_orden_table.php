<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabOrdenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_orden', function (Blueprint $table) {
            $table->bigInteger('cod_ord', true);
            $table->integer('ced_ord')->nullable();
            $table->date('fec_ord')->nullable();
            $table->string('hra_ord', 8)->nullable();
            $table->string('ped_ord', 20);
            $table->integer('tmo_ord');
            $table->decimal('hor_ord', 10);
            $table->decimal('ver_ord', 10);
            $table->decimal('max_ord', 10);
            $table->decimal('pue_ord', 10);
            $table->text('obs_ord');
            $table->integer('usu_ord');
            $table->integer('est_ord');
            $table->integer('est_ord2');
            $table->string('caj_ord', 40);
            $table->date('fde_ord');
            $table->bigInteger('num_fact');
            $table->date('fec_fact');
            $table->double('sub_fact', 20, 2);
            $table->double('bas_ord', 20, 2);
            $table->integer('val_iva');
            $table->double('iva_fact', 10, 2);
            $table->integer('por_des');
            $table->double('des_fact', 20, 2);
            $table->double('tot_fact', 20, 2);
            $table->integer('lab_ord')->default(1);
            $table->integer('web_ord');
            $table->string('pat_ord', 15);
            $table->float('mon_pat', 20);
            $table->integer('est_pat');
            $table->integer('med_ord');
            $table->string('obs_sta', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tab_orden');
    }
}
