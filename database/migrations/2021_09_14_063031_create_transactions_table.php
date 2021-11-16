<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned();
            $table->text('transaction_id')->nullable();
            $table->bigInteger('user_id');
            $table->bigInteger('restaurant_id');
            $table->bigInteger('vendor_id');
            $table->tinyInteger('pay_mode')->default(1)->comment("1=Cod, 2=Card, 3=Pay on account");
            $table->tinyInteger('type')->default(1)->comment("1=COD, 2=Online, 3=Pay on Account");
            $table->float('grand_total',12,2);
            $table->tinyInteger('trans_status')->default(1)->comment("1=Pending, 2=PAID, 3=Failed");
            
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
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
        Schema::dropIfExists('transactions');
    }
}
