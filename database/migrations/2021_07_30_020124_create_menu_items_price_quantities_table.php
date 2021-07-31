<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemsPriceQuantitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items_price_quantities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('menu_quantity_group_id')->unsigned();
            $table->bigInteger('menu_item_id')->unsigned();
            $table->float('price',12,2);
            $table->tinyInteger('status')->default(1)->comment("1=Active, 0=Inactive");
            $table->timestamps();
            
            $table->foreign('menu_quantity_group_id')->references('id')->on('menu_quantity_groups')->onDelete('cascade');
            $table->foreign('menu_item_id')->references('id')->on('menu_items')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_items_price_quantities');
    }
}
