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
            $table->string('nivel');
            $table->string('num_elemento');
            $table->string('terminais_sul');
            $table->string('substituicao_ele');
            $table->string('substituicao_ter');
            $table->string('substituicao_unioes');
            $table->string('estado');
            $table->boolean('inundada')->default(false);
            $table->boolean('furada')->default(false);
            $table->boolean('sulfatada')->default(false);
            $table->boolean('drenagem')->default(false);
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
