<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id_pedido');
            $table->integer('id_endereco')->unsigned();
            $table->integer('id_tpedido')->unsigned();
            $table->integer('id_pagamento')->unsigned();
            $table->integer('id_restaurante')->unsigned();
            $table->string('ped_status');
            $table->timestamps();
            $table->foreign('id_endereco')->references('id_endereco')->on('enderecos')->onDelete('cascade');
            $table->foreign('id_tpedido')->references('id_tpedido')->on('tipo_de_pedidos')->onDelete('cascade');
            $table->foreign('id_restaurante')->references('id_restaurante')->on('restaurantes')->onDelete('cascade');
              $table->foreign('id_pagamento')->references('id_pagamento')->on('pagamentos')->onDelete('cascade');
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
