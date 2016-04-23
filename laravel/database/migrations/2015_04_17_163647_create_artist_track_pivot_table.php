<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistTrackPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('artist_track', function(Blueprint $table)
		{
			$table->integer('artist_id')->unsigned()->index();
			$table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');
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
		Schema::drop('artist_track');
	}

}
