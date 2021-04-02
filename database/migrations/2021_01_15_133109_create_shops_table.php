<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('s_name')->nullable();
            $table->string('s_category')->nullable();
            $table->string('s_vendor')->nullable();                       
            $table->integer('open_hh')->nullable();
            $table->integer('open_mm')->nullable();
            $table->integer('close_hh')->nullable();
            $table->integer('close_mm')->nullable();
            $table->string('s_banner')->nullable();
            $table->string('s_brance')->nullable();
            $table->double('s_discount')->nullable();
            $table->bigInteger('total_rate')->nullable();
            $table->bigInteger('total_star')->nullable();
            $table->boolean('shop')->default(0);
            $table->string('s_status')->nullable();
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
        Schema::dropIfExists('shops');
    }
}
