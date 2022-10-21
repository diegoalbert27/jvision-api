<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabDetfacTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_detfac', function (Blueprint $table) {
            $table->bigInteger('cod_dfac', true);
            $table->bigInteger('fac_dfac');
            $table->string('art_dfac', 30);
            $table->integer('can_dart');
            $table->double('pre_dfac', 20, 2);
            $table->integer('ord_dfac');
            $table->string('ped_dfac', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tab_detfac');
    }
}
