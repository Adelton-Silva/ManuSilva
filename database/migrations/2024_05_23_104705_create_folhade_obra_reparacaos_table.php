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
        Schema::create('folhade_obra_reparacaos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('repara_id');
            $table->string('data_intervencao');
            $table->string('material_gasto');
            $table->string('horas');
            $table->bigInteger('total_horas');
            $table->bigInteger('relizado_por');
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
        Schema::dropIfExists('folhade_obra_reparacaos');
    }
};
