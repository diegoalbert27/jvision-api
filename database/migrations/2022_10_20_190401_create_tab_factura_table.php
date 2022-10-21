<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_factura', function (Blueprint $table) {
            $table->integer('cod_fac', true);
            $table->date('fec_fac');
            $table->string('cli_fac', 20);
            $table->string('tip_fac', 15);
            $table->integer('tie_cre');
            $table->date('fec_ven');
            $table->string('ord_fac', 20);
            $table->string('sta_fac', 15);
            $table->integer('anu_fac');
            $table->date('fec_anu');
            $table->double('sub_tot', 20, 2);
            $table->double('bas_fac', 20, 2);
            $table->decimal('por_des', 4);
            $table->double('des_fac', 20, 2);
            $table->integer('val_iva');
            $table->double('iva_fac', 20, 2);
            $table->double('tot_fac', 30, 2);
            $table->text('obs_fact');
            $table->integer('pre_fact');
            $table->string('mod_fac', 50);
            $table->integer('num_con');
            $table->integer('web_fac');
            $table->integer('imp_fac');
            $table->string('fac_fis', 11);
            $table->string('usu_fac', 50);
            $table->double('dol_fac');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tab_factura');
    }
}
