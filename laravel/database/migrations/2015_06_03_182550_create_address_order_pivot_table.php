<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressOrderPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('address_order', function(Blueprint $table)
		{
			$table->boolean('shipping');
			$table->boolean('billing');
			$table->integer('address_id')->unsigned()->index();
			$table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
			$table->integer('order_id')->unsigned()->index();
			$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('address_order');
	}

}
