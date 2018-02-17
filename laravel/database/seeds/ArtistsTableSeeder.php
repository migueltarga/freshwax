<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ArtistsTableSeeder extends Seeder {

    public function run()
    {
         TestDummy::times(20)->create('freshwax\Models\Artist');
    }

}
