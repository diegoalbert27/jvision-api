<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabTipoartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_tipoart', function (Blueprint $table) {
            $table->string('cod_tip', 1)->default('')->primary();
            $table->string('nom_tip', 25)->nullable();
            $table->integer('inv_tip');
            $table->integer('ven_tip');
            $table->integer('iva_tip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tab_tipoart');
    }
}
