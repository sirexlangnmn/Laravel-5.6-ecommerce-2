<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            /*$table->increments('product_id');*/
            $table->increments('id');
            $table->string('product_name');
            $table->string('product_code')->unique();
            $table->float('product_price', 8,2);
            $table->text('product_description');
            $table->tinyInteger('product_status');
            $table->string('product_image');
            $table->timestamps();
            $table->softDeletes();
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
