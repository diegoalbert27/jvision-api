<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabAlmacenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_almacen', function (Blueprint $table) {
            $table->integer('cod_alm', true);
            $table->string('nom_alm', 100);
            $table->text('ubi_alm');
            $table->integer('ven_alm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tab_almacen');
    }
}
