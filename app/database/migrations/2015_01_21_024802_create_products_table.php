<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {
        
    public function up()
	{
            Schema::create('products', function($product){
                $product->increments('id');
                $product->string('name');
                $product->text('profile');
                $product->integer('stock');
                $product->decimal('price', 10, 2);
                $product->decimal('discount', 10, 2);
                $product->boolean('featured');
                $product->integer('category_id');
                $product->integer('warehouse_id');
                $product->integer('manufacturer_id');
                $product->timestamps();
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('products');
	}
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	
}
