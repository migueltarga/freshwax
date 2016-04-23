<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPostPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_post', function(Blueprint $table)
		{
			$table->integer('event_id')->unsigned()->index();
			$table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
			$table->integer('post_id')->unsigned()->index();
			$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('event_post');
	}

}
