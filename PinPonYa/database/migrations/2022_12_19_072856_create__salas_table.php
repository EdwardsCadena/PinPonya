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
        Schema::create('_salas', function (Blueprint $table) {
            $table->id('IdSalas');
            $table->unsignedBigInteger('FkHotel')->unsigned();
            $table->foreign('FkHotel')->references('IdHoteles')->on('_hoteles');
            $table->integer('Capacidad');
            $table->string('MediosComunicacion',255);
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
        Schema::dropIfExists('_salas');
    }
};
