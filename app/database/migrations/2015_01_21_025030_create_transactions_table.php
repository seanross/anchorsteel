<?php

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
                $transaction->string('status');
                $transaction->string('received_by')->nullable();
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
