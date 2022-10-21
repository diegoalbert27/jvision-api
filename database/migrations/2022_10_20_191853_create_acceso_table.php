<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccesoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acceso', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('cedula');
            $table->text('nombre');
            $table->text('apellido');
            $table->string('clave', 20)->comment('Clave de acceso');
            $table->string('usuario', 50)->comment('Nombre de Usuario');
            $table->integer('nivel')->default(2);
            $table->text('avatar');
            $table->text('servidor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acceso');
    }
}
