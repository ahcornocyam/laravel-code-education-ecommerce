<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->decimal('total', 8, 2);
            $table->string('transaction_code', 64)->nullable();
            $table->integer('payment_type_id')->nullable();
            $table->foreign('payment_type_id')->references('id')->on('order_paymenttypes');
            $table->integer('status_id');
            $table->foreign('status_id')->references('id')->on('order_statuses');
            $table->integer('netAmount')->nullable();
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
        Schema::drop('orders');
    }
}
