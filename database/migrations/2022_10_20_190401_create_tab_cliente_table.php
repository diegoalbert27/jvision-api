<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_cliente', function (Blueprint $table) {
            $table->integer('cod_cli', true);
            $table->string('nac_cli', 2);
            $table->integer('ced_cli');
            $table->text('nom_cli');
            $table->text('ape_cli');
            $table->date('fec_nac');
            $table->text('dir_cli');
            $table->text('ciu_cli');
            $table->integer('est_cli');
            $table->string('tel_cli', 20);
            $table->string('cel_cli', 20);
            $table->text('cor_cli');
            $table->double('por_cli');
            $table->integer('ret_iva');
            $table->integer('ret_islr');
            $table->integer('tip_cli');
            $table->integer('lis_cli');
            $table->integer('web_cli');
            $table->integer('pat_cli');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tab_cliente');
    }
}
