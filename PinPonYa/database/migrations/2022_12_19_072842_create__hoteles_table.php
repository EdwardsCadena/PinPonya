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
        Schema::create('_hoteles', function (Blueprint $table) {
            $table->unsignedBigInteger('IdHoteles')->unique();
            $table->string('Nombre',100);
            $table->string('Direccion',100);
            $table->string('Telefonos',55);
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
        Schema::dropIfExists('_hoteles');
    }
};
