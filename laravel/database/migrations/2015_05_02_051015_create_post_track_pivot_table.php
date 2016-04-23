<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTrackPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_track', function(Blueprint $table)
		{
			$table->integer('post_id')->unsigned()->index();
			$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
			$table->integer('track_id')->unsigned()->index();
			$table->foreign('track_id')->references('id')->on('tracks')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('post_track');
	}

}
