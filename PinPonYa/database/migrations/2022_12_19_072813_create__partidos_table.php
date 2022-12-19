<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_partidos', function (Blueprint $table) {
            $table->id('Codigo');
            $table->unsignedBigInteger('FKJugador1')->unsigned();
            $table->unsignedBigInteger('FkJugador2')->unsigned();
            $table->unsignedBigInteger('FkJuez')->unsigned();
            $table->string('Marcador',255);
            $table->string('Comentario',255);
            $table->foreign('FKJugador1')->references('NumeroAsociado')->on('_participantes');
            $table->foreign('FkJugador2')->references('NumeroAsociado')->on('_participantes');
            $table->foreign('FkJuez')->references('NumeroAsociado')->on('_participantes');
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
        Schema::dropIfExists('_partidos');
    }
};
