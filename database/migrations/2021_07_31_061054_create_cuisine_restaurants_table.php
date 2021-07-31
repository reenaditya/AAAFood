<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuisineRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuisine_restaurants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cuisine_id')->unsigned();
            $table->bigInteger('restaurant_id')->unsigned();
            $table->tinyInteger('status')->default(1)->comment("1=Active, 0=Inactive");
            $table->timestamps();
            $table->foreign('cuisine_id')->references('id')->on('cuisines')->onDelete('cascade');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuisine_restaurants');
    }
}
