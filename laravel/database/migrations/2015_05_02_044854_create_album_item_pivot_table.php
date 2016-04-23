<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumItemPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('album_item', function(Blueprint $table)
		{
			$table->integer('album_id')->unsigned()->index();
			$table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
			$table->integer('item_id')->unsigned()->index();
			$table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('album_item');
	}

}
