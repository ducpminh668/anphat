<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('import_id')->unsigned();
            $table->foreign('import_id')->references('id')->on('imports');
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('product_name');
            $table->string('dvt');
            $table->string('manufacturer')->nullable();
            $table->integer('quantity');
            $table->decimal('price', 12, 0);
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
        Schema::dropIfExists('import_details');
    }
}
