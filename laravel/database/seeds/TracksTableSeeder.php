<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class TracksTableSeeder extends Seeder {

    public function run()
    {
        TestDummy::times(50)->create('freshwax\Models\Track');
    }

}