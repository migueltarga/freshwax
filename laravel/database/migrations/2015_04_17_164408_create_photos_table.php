<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->text('caption')->nullable();
			$table->string('path');
			$table->integer('label_id')->nullable()->unsigned();
			$table->integer('artist_id')->nullable()->unsigned();
			$table->integer('album_id')->nullable()->unsigned();
			$table->integer('track_id')->nullable()->unsigned();
			$table->integer('event_id')->nullable()->unsigned();
			$table->integer('post_id')->nullable()->unsigned();
			$table->integer('item_id')->nullable()->unsigned();
			$table->boolean('banner');
			$table->boolean('background');
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
		Schema::drop('photos');
	}

}
