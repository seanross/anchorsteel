<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('transactions', function($transaction){
                $transaction->increments('id');
                $transaction->integer('user_id');
                $transaction->string('productname');
                $transaction->string('status');
                $transaction->integer('quantity');
                $transaction->decimal('price', 10, 2);
                $transaction->timestamps();
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('transactions');
	}

}
