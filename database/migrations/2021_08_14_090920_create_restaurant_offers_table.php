<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_offers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('restaurant_id')->unsigned();
            $table->string('offer_type',250)->nullable();
            $table->string('file',250)->nullable();
            $table->string('offer_valid_day',250)->nullable();
            $table->tinyInteger('offer_valid_time')->nullable();
            $table->text('terms_condition')->nullable();
            $table->tinyInteger('status')->default(1)->comment("1=Active, 0=Inactive");
            $table->timestamps();
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
        Schema::dropIfExists('restaurant_offers');
    }
}
