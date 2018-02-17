<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UsersTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('ArtistsTableSeeder');
		$this->call('EventsTableSeeder');
		$this->call('ItemsTableSeeder');
		$this->call('AlbumsTableSeeder');
		$this->call('TagsTableSeeder');
		$this->call('PostsTableSeeder');
		$this->call('TracksTableSeeder');
	}

}
