<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarpetaMedidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpeta_medida', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carpeta_id');
            $table->foreign('carpeta_id')->references('id')->on('carpetas')->onDelete('cascade');
            
            $table->unsignedBigInteger('medida_id');
            $table->foreign('medida_id')->references('id')->on('medidas')->onDelete('cascade');
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
        Schema::dropIfExists('carpeta_medida');
    }
}
