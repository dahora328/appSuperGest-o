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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('unidade',5);
            $table->string('descricao',30);
            $table->timestamps();
        });


        //adicionar relacionamento com a tabela produtos
        Schema::table('products', function (Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('units');
        });


        //adicionar relacionamento com a tabela produtos detalhes
        Schema::table('products_details', function (Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('units');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //remover relacionamento com a tabela produtos detalhes
        Schema::table('products_details', function (Blueprint $table){
            //remover a fk
            $table->dropForeign('products_details_unidade_id_foreign'); //nome foreign [tabela]_[coluna]_foreign
            //remover a coluna
            $table->dropColumn('unidade_id');
        });

        //remover relacionamento com a tabela produtos detalhes
        Schema::table('products', function (Blueprint $table){
            //remover a fk
            $table->dropForeign('products_unidade_id_foreign'); //nome foreign [tabela]_[coluna]_foreign
            //remover a coluna
            $table->dropColumn('unidade_id');
        });


        Schema::dropIfExists('units');
    }
};
