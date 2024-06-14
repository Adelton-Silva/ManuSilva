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
        Schema::create('reparacaos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('carregador_id');
            $table->bigInteger('user_id');
            $table->longText('tempo_gasto');
            $table->longText('estado');
            $table->string('data_saida');
            $table->string('estado_faturacao');
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
        Schema::dropIfExists('reparacaos');
    }
};
