<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumTagPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('album_tag', function(Blueprint $table)
		{
			$table->integer('album_id')->unsigned()->index();
			$table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
			$table->integer('tag_id')->unsigned()->index();
			$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('album_tag');
	}

}
