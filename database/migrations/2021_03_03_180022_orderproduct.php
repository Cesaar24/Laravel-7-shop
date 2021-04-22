<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orderproduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderproducts', function (Blueprint $table) {

            $table->foreignId('id_order')->references('id')->on('orders');
            $table->foreignId('id_product')->references('id')->on('products');
            $table->char('quantity',30);
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
       Schema::dropIfExists('orderproducts');
    }
}