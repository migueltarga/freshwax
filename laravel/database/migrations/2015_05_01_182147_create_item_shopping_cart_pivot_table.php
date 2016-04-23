<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemShoppingCartPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item_shopping_cart', function(Blueprint $table)
		{
			$table->integer('quantity'); 
			$table->integer('item_id')->unsigned()->index();
			$table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
			$table->integer('shopping_cart_id')->unsigned()->index();
			$table->foreign('shopping_cart_id')->references('id')->on('shopping_carts')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('item_shopping_cart');
	}

}
