<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas');
            $table->integer('subarea_id')->unsigned();
            $table->foreign('subarea_id')->references('id')->on('subareas');
            $table->integer('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->string('nombre', 80);
            $table->string('cargo', 80);
            $table->integer('ciudad_id')->unsigned();
            $table->foreign('ciudad_id')->references('id')->on('ciudads');
            $table->string('telefono', 100);
            $table->string('celular', 100);
            $table->string('email', 100);
            $table->string('direccion', 200);
            $table->text('especializado');
            $table->integer('cupo_id')->unsigned();
            $table->foreign('cupo_id')->references('id')->on('cupos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
