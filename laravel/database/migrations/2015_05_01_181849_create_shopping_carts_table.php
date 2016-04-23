<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingCartsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shopping_carts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->nullable(); 
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->integer('order_id')->unsigned()->nullable(); 
			$table->decimal('total', 19, 2)->nullable();
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
		Schema::drop('shopping_carts');
	}

}
