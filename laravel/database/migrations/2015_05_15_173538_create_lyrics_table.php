<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLyricsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lyrics', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('lyrics'); 
			$table->string('credit'); 
			$table->integer('track_id')->unsigned(); 
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
		Schema::drop('lyrics');
	}

}
