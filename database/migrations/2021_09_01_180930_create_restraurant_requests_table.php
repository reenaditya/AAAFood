<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestraurantRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restraurant_requests', function (Blueprint $table) {
            $table->id();
            $table->string('fname',250);
            $table->string('lname',250);
            $table->string('email',250);
            $table->string('phone_number',25);
            $table->string('restaurant_name',250);
            $table->string('food_type',250)->nullable();
            $table->string('address',255)->nullable();
            $table->string('city',255)->nullable();
            $table->string('state',255)->nullable();
            $table->string('zipcode',255)->nullable();
            $table->string('relation',255)->nullable();
            $table->text('comments')->nullable();
            $table->tinyInteger('status')->default(1)->comment("1=Active, 0=Inactive");
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
        Schema::dropIfExists('restraurant_requests');
    }
}
