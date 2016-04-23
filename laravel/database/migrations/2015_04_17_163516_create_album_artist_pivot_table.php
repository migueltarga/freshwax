<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumArtistPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('album_artist', function(Blueprint $table)
		{
			$table->integer('album_id')->unsigned()->index();
			$table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
			$table->integer('artist_id')->unsigned()->index();
			$table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('album_artist');
	}

}
