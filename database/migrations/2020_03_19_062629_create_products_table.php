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
            $table->string('prod_name');
            $table->string('prod_desc');
            $table->integer('prod_category');
            $table->string('prod_color');
            $table->bigInteger('prod_price');
            $table->string('prod_image_main');
            $table->string('pro_img_1');
            $table->string('pro_img_2');
            $table->string('pro_img_3');
           
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
        Schema::dropIfExists('products');
    }
}
