<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class AlbumsTableSeeder extends Seeder {

    public function run()
    {
        TestDummy::times(100)->create('freshwax\Models\Album');
    }

}