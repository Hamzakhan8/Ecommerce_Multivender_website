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
            $table->increments('id');
            $table->integer('buyer_id')->unsigned();
            $table->integer('seller_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); 
            $table->integer('quantity');
            $table->text('extras')->nullable();
            $table->float('total_price');
            $table->string('type')->nullable();
            $table->string('delivery_charges')->nullable();
            $table->text('shipping_address')->nullable();
            $table->string('status');
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
