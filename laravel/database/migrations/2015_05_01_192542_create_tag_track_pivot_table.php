<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTrackPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tag_track', function(Blueprint $table)
		{
			$table->integer('tag_id')->unsigned()->index();
			$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
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
		Schema::drop('tag_track');
	}

}
