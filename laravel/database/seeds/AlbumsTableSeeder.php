<?php

use Illuminate\Database\Seeder;

use Laracasts\TestDummy\Factory as TestDummy;

class AlbumsTableSeeder extends Seeder {

    public function run()
    {
        TestDummy::times(100)->create('freshwax\Models\Album');
    }

}
