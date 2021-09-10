<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('return_order_id')->unsigned();
            $table->foreign('return_order_id')->references('id')->on('return_orders');
            $table->string('product_name');
            $table->decimal('price', 12, 0);
            $table->decimal('rowtotal', 12, 0);
            $table->integer('quantity');
            $table->string('barcode');
            $table->string('short_desc');
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
        Schema::dropIfExists('return_order_details');
    }
}
