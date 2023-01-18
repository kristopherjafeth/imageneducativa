<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosotrosTable extends Migration
{
    
    public function up()
    {
        Schema::create('pedidosotros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pedido_id');
            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');

            $table->unsignedBigInteger('producto_id')->nullable();
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');


            $table->integer('cantidadproducto')->nullable();


            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('pedidosotros');
    }
}
