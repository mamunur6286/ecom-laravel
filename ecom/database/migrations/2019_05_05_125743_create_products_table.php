<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name',100);
            $table->string('image',100)->nullable();
            $table->string('retail_price',100);
            $table->string('wholesale_price',100);
            $table->string('wholesale_qnty',100);
            $table->text('description')->nullable();
            $table->string('unit')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
            $table->foreign('slug')->references('slug')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
