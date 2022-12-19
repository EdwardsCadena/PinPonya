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
        Schema::create('_participantes', function (Blueprint $table) {
            $table->unsignedBigInteger('NumeroAsociado')->unique();
            $table->string('Nombre',55);
            $table->string('Direccion',55);
            $table->bigInteger('Telefono');
            $table->integer('CampeonatosJugador');
            $table->integer('CampeonatosJuez');
            $table->integer('NivelJuego');
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
        Schema::dropIfExists('_participantes');
    }
};
