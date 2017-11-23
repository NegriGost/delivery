<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrinhoDeComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrinho_de_compras', function (Blueprint $table) {
            $table->increments('id_carrinho');
            $table->integer('id_produto')->unsigned();
            $table->integer('id_pedido')->unsigned();
            $table->integer('car_qtd')->unsigned();
            $table->decimal('car_preco');
            $table->string('car_total');
            $table->timestamps();
            $table->foreign('id_produto')->references('id_produto')->on('produtos')->onDelete('cascade');
            $table->foreign('id_pedido')->references('id_pedido')->on('pedidos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrinho_de_compras');
    }
}
