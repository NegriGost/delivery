<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurantes', function (Blueprint $table) {
            $table->increments('id_restaurante');
            $table->integer('id_cozinha')->unsigned();
            $table->string('rest_nome');
            $table->string('rest_endereco');
            $table->string('rest_numero');
            $table->string('rest_telefone');
            $table->string('rest_email');
            $table->string('rest_senha');
            $table->string('rest_imagem');
            $table->string('rest_lat');
            $table->string('rest_long');
            $table->boolean('rest_status');
            $table->timestamps();
            $table->foreign('id_cozinha')->references('id_cozinha')->on('tipo_de_cozinhas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurantes');
    }
}
