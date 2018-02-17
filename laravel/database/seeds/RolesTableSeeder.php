<?php

use freshwax\Models\Role

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		if(Role::count() === 0){

			$role_admin = new Role();
			$role_admin->name = 'Admin';
			$role_admin->save();

			$role_listener = new Role();
			$role_listener->name = 'Listener';
			$role_listener->save();

			$role_artist = new Role();
			$role_artist->name = 'Artist';
			$role_artist->save();

			$role_listener = new Role();
			$role_listener->name = "Listener";
			$role_listener->save();

		}
	}
}
