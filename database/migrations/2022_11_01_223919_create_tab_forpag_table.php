<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabForpagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_forpag', function (Blueprint $table) {
            $table->bigInteger('cod_for', true);
            $table->bigInteger('fac_for');
            $table->string('tip_for', 50);
            $table->double('mon_for');
            $table->integer('anu_for');
            $table->integer('doc_for');
            $table->integer('ban_for');
            $table->bigInteger('abo_for');
            $table->double('tas_for');
            $table->double('dol_for');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tab_forpag');
    }
}
