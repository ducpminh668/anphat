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
            $table->string('manufacturer')->nullable();
            $table->string('batch_code')->nullable();
            $table->text('barcode')->nullable();
            $table->longText('thumbnail');
            $table->integer('quantity')->unsigned()->default(0);
            $table->decimal('cost_price', 12, 0);
            $table->decimal('sell_price', 12, 0);
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
