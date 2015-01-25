<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufacturersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	Schema::create('manufacturers', function($m){
                $m->increments("id");
                $m->string("name");
                $m->string("address");
                $m->string("contactno");
                $m->string("contactperson");
                $m->text("profile");
                $m->text("imagelink");
                $m->text("website");
                $m->timestamps();
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('manufacturers');
	}

}
