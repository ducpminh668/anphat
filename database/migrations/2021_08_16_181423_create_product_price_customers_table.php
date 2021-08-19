<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPriceCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_price_customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_price_id')->unsigned();
            $table->foreign('product_price_id')->references('id')->on('product_prices');
            $table->unsignedBigInteger('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('customer_groups');
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
        Schema::dropIfExists('product_price_customers');
    }
}
