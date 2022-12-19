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
        Schema::create('_alojamientos', function (Blueprint $table) {
            $table->id('Participante');
            $table->unsignedBigInteger('FkHotel')->unsigned();
            $table->foreign('FkHotel')->references('IdHoteles')->on('_hoteles');
            $table->date('FechaInicio');
            $table->date('FechaFin');
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
        Schema::dropIfExists('_alojamientos');
    }
};
