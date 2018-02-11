<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tracks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('file_name');
			$table->string('path');
			$table->string('ext');
			$table->string('original_ext');
			$table->integer('user_id')->unsigned();
			$table->integer('album_id')->unsigned()->nullable();
			$table->text('embed')->nullable();
			$table->string('length')->nullable();
			$table->text('comment')->nullable();
			$table->boolean('uploaded');
			$table->boolean('private');
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
		Schema::drop('tracks');
	}

}
