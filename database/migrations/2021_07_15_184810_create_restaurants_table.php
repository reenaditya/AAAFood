<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->nullable();
            $table->string('slug',255)->nullable();
            $table->string('cuisines',255)->nullable();
            $table->string('location',255)->nullable();
            $table->string('address',255)->nullable();
            $table->string('address2',255)->nullable();
            $table->string('city',100)->nullable();
            $table->string('state',100)->nullable();
            $table->string('country',100)->nullable();
            $table->string('zipcode',100)->nullable();
            $table->text('website')->nullable();
            $table->string('sale_tax',50)->nullable();
            $table->tinyInteger('dine_in')->nullable()->comment("1=Yes, 0=No");
            $table->string('seating_capacity_indoor',100)->nullable();
            $table->string('seating_capacity_outdoor',100)->nullable();
            $table->tinyInteger('reservations')->default(0)->comment("1=Yes, 0=No");
            $table->tinyInteger('reservation_system')->default(4);
            $table->tinyInteger('takeout')->default(0)->comment("1=Yes, 0=No");
            $table->tinyInteger('own_delivery')->default(0)->comment("1=Yes, 0=No");
            $table->float('delivery_fee',12,2)->nullable();
            $table->float('minimum_delivery_amount',12,2)->nullable();
            $table->float('free_delivery_amount',12,2)->nullable();
            $table->string('delivery_radius',100)->nullable();
            $table->string('delivery_zip_codes',200)->nullable();
            $table->integer('order_lead_time')->nullable();
            $table->integer('delivery_extra_time')->nullable();
            $table->tinyInteger('delivery_service')->default(0)->comment("1=Yes, 0=No");
            $table->string('participate_file',255)->nullable();
            $table->tinyInteger('aaadining_club')->default(0)->comment("1=Yes, 0=No");
            $table->tinyInteger('birthday_club')->default(0)->comment("1=Yes, 0=No");
            $table->time('mf_from')->nullable();
            $table->time('mf_to')->nullable();
            $table->time('sat_from')->nullable();
            $table->time('sat_to')->nullable();
            $table->time('sun_from')->nullable();
            $table->time('sun_to')->nullable();
            $table->text('description')->nullable();
            $table->string('image',255)->nullable();
            $table->tinyInteger('serve')->nullable();
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
        Schema::dropIfExists('restaurants');
    }
}
