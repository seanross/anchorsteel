<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function($order){
                $order->increments('id');
                $order->integer('product_id');
                $order->integer('transaction_id');
                $order->integer('quantity');
                $order->decimal('price', 10, 2);
                $order->timestamps();
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
