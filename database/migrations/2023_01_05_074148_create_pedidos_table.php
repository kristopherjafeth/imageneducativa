<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');

            $table->unsignedBigInteger('carpeta_id')->nullable();
            $table->foreign('carpeta_id')->references('id')->on('carpetas')->onDelete('cascade');

            $table->unsignedBigInteger('medida_id')->nullable();
            $table->foreign('medida_id')->references('id')->on('medidas')->onDelete('cascade');

            $table->unsignedBigInteger('color_id')->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');


          


            $table->integer('cantidadmedalla')->nullable();

            
            $table->integer('cantidadcarpeta')->nullable();


            $table->date('fechaentrega')->nullable();

            $table->string('estado');
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
        Schema::dropIfExists('pedidos');
    }
}
