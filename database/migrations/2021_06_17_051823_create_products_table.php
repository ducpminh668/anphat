<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('dvt')->nullable()->default('chiếc');
            $table->string('manufacturer')->nullable();
            $table->string('barcode')->nullable();
            $table->string('short_desc')->nullable();
            $table->longText('thumbnail');
            $table->integer('quantity')->unsigned()->default(0);
            $table->decimal('cost_price', 12, 0)->nullable()->default(0);
            $table->decimal('sell_price', 12, 0);
            $table->integer('count_per_box')->nullable();
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
        Schema::dropIfExists('products');
    }
}
