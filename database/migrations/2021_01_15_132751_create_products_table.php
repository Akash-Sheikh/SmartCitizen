<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('p_name')->nullable();
            $table->string('p_category')->nullable();
            $table->string('shop_id')->nullable();                       
            $table->string('p_vendor')->nullable();
            $table->double('p_price')->nullable();
            $table->double('p_discount')->nullable();
            $table->longText('p_description')->nullable();
            $table->string('p_availability')->nullable();
            $table->string('p_img_1')->nullable();
            $table->string('p_img_2')->nullable();
            $table->string('p_img_3')->nullable();
            $table->integer('a_hh')->nullable();
            $table->integer('a_mm')->nullable();
            $table->integer('d_hh')->nullable();
            $table->integer('d_mm')->nullable();
            $table->bigInteger('total_rate')->nullable();
            $table->bigInteger('total_star')->nullable();
            $table->boolean('product')->default(0);
            $table->string('p_status')->nullable();
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
