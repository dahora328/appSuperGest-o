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
        //criando tabela filiais
        Schema::create('affiliateds', function (Blueprint $table){
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });

        //criando tabela produtos filiais
        Schema::create('products_affiliateds', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('product_id');
            $table->decimal('preco_venda', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();

            //fk
            $table->foreign('filial_id')->references('id')->on('affiliateds');
            $table->foreign('product_id')->references('id')->on('products');
        });

        //removendo colunas da tabela produtos
        Schema::table('products', function (Blueprint $table){
            $table->dropColumn(['preco_venda', 'estoque_minimo', 'estoque_maximo']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //adcionar colunas da tabela produtos
        Schema::table('products', function (Blueprint $table){
            $table->decimal('preco_venda', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
        });

        Schema::dropIfExists('products_affiliateds');

        Schema::dropIfExists('affiliateds');
    }
};
