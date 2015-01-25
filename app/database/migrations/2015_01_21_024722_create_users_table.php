<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	public function up()
	{
            Schema::create('users', function($user){
			$user->increments('id');
			$user->string('email')->unique();
			$user->string('username', 100)->unique();
			$user->string('password', 128);
			$user->string('remember_token', 100)->nullable();
                        $user->string('firstname');
                        $user->string('middlename');
                        $user->string('lastname');
                        $user->string('address');
                        $user->string('contactno');
			$user->timestamps();
		});



	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('users');
	}
}
