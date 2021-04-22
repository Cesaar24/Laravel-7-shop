<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->char('Name',30);
            $table->char('Lastname',30);
            $table->text('Cedula');
            $table->char('Estado',25);
            $table->char('city',25);
            $table->text('phone');
            $table->string('email');
            $table->char('delivery',40);
            $table->char('payment',40);


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
