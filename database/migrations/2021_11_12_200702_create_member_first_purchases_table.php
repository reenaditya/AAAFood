<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberFirstPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_first_purchases', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('restaurant_id');
            $table->bigInteger('vendor_id');
            $table->bigInteger('order_id');
            $table->integer('paid_to_vendor')->nullable();
            $table->tinyInteger('payment_status')->default(0)->comment("1=Paid, 0=Unpaid");
            $table->tinyInteger('status')->default(1)->comment("1=active, 0=Inactive");
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
        Schema::dropIfExists('member_first_purchases');
    }
}
