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
        Schema::create('baterias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cliente_id');
            $table->string('tipo');
            $table->string('matricula');
            $table->string('emp_marca');
            $table->string('emp_modelo');
            $table->string('car_tipo');
            $table->string('car_matricula');
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
        Schema::dropIfExists('baterias'); 
    }
};
