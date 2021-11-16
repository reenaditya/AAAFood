<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_number');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('restaurant_id');
            $table->bigInteger('vendor_id');
            $table->bigInteger('delivery_user_id')->nullable();
            $table->text('token');
            $table->float('sub_total',12,2);
            $table->string('item_discount')->nullable();
            $table->float('tax',12,2)->default(0)->nullable();
            $table->float('shiping',12,2)->default(0)->nullable();
            $table->float('total',12,2)->nullable();
            $table->string('promo',50)->nullable();
            $table->string('discount',150)->nullable();
            $table->float('grand_total',12,2)->nullable();
            $table->text('address');
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->text('note')->nullable();
            $table->text('admin_comment')->nullable();
            $table->tinyInteger('payment_status')->default(1)->comment("1=pending, 2=Completed,3=Failed,4=Refunded");
            $table->tinyInteger('order_status')->default(1)->comment("1=pending, 2=Prepare,3=Packed,4:On the Way,5:Delivered,6:Canceled,7:Completed,8:Refunded");
            $table->tinyInteger('delivery_type')->default(1)->comment("1=Home, 2=Pick up, 3=Dine in");
            $table->tinyInteger('status')->default(1)->comment("1=Active, 0=Inactive");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
