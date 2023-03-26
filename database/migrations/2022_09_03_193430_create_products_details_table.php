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
        Schema::create('products_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->double('comprimento',8, 2);
            $table->double('largura',8, 2);
            $table->double('altura',8, 2);
            $table->timestamps();


            $table->foreign('produto_id')->references('id')->on('products');
            $table->unique('produto_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_details');
    }
};
