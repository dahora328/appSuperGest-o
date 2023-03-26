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
        Schema::table('contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contato_id');
        });

        DB::statement('update contacts set motivo_contato_id = motivo_contato');

        //criando fk e também remover a coluna motivo_contato
        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('motivo_contato_id')->references('id')->on('contact_reasons');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //criar a coluna motivo_contato e removendo Fk
        Schema::table('contacts', function (Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('contacts_motivo_contato_id_foreign');
        });

        DB::statement('update contacts set motivo_contato = motivo_contato_id');


        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('motivo_contato_id');
        });
    }
};
