<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistPostPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('artist_post', function(Blueprint $table)
		{
			$table->integer('artist_id')->unsigned()->index();
			$table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');
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
		Schema::drop('artist_post');
	}

}
