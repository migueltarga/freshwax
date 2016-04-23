<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistEventPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('artist_event', function(Blueprint $table)
		{
			$table->integer('artist_id')->unsigned()->index();
			$table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');
			$table->integer('event_id')->unsigned()->index();
			$table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('artist_event');
	}

}
