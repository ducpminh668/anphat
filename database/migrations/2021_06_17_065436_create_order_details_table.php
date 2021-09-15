<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->string('product_name');
            $table->decimal('price', 12, 0);
            $table->decimal('rowtotal', 12, 0);
            $table->decimal('cost_price', 12, 0);
            $table->integer('product_id');
            $table->integer('quantity');
            $table->string('barcode');
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
        Schema::dropIfExists('order_details');
    }
}
