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
        Schema::create('carregadors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cliente_id');
            $table->string('marca');
            $table->string('modelo');
            $table->longText('num_serie');
            $table->longText('descri_avaria');
            $table->string('data_entrada');
            $table->longText('descri_atividade');
            $table->string('data_saida');
            $table->string('image');
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
        Schema::dropIfExists('carregadors');
    }
};
