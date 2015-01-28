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
            Schema::create('orders', function($o){
                $o->increments('id');
                $o->integer('quantity');
                $o->integer('product_id');
                $o->integer('transaction_id');
                $o->decimal('subtotal', 10, 2);
                $o->timestamps();
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
