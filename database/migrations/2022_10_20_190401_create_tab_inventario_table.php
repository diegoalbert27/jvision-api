<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabInventarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_inventario', function (Blueprint $table) {
            $table->bigInteger('cod_inv', true);
            $table->integer('alm_inv')->nullable();
            $table->string('art_inv', 14)->nullable();
            $table->bigInteger('can_inv')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tab_inventario');
    }
}
