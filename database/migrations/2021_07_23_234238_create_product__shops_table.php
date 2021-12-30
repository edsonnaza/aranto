<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_shops', function (Blueprint $table) {
          
           
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'id_product_shop_fk')->references('id')->on('productos');

            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id', 'id_shop_id_fk')->references('id')->on('shops');

            $table->double('products_amount', 15, 4);
            $table->double('price', 15, 4);

           
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
        Schema::dropIfExists('product_shops');
    }
}
