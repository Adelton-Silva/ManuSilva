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
        Schema::create('manutencao_baterias', function (Blueprint $table) {
            $table->id();
            $table->string('data');
            $table->bigInteger('bateria_id');
            $table->string('densidade');
            $table->string('tensao');
            $table->string('nivel');
            $table->string('num_elemento_cir');
            $table->string('qt_terminais_sul');
            $table->string('qt_substituicao_ele');
            $table->string('qt_substituicao_ter');
            $table->string('qt_substituicao_unioes');
            $table->string('estado');
            $table->string('inundada')->default('NÃO');
            $table->string('furada')->default('NÃO');
            $table->string('sulfatada')->default('NÃO');
            $table->string('drenagem')->default('NÃO');
            $table->string('ficha');
            $table->string('car_funcionamento');
            $table->string('obs');
            $table->bigInteger('user_id');
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
        Schema::dropIfExists('manutencao_baterias'); 
    }
};
