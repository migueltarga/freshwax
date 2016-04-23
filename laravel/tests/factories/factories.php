<?php 

$factory('freshwax\Models\User', [
    'name' => $faker->name,
    'email' => $faker->email, 
    'password' => 'password', 
    'isadmin' => false, 
    'isartist' => false
]);

$factory('freshwax\Models\Artist', [
    'name' => $faker->word,
    'hometown' => $faker->city, 
    'bio' => $faker->paragraph(2)
]);


$factory('freshwax\Models\Album', [
    'name' => $faker->word,
    'release_date' => $faker->dateTimeBetween('-3 years', 'now'), 
    'description' => $faker->paragraph(2), 
    'personnel' => $faker->paragraph(1), 
    'private' => $faker->boolean 
]);

$factory('freshwax\Models\Track', [
    'name' => $faker->word,
    'path' => $faker->file(),
    'album_id' => "factory:freshwax\Models\Album",
    'comment' => $faker->paragraph(1), 
    'private' => $faker->boolean 
]);


$factory('freshwax\Models\Event', [
    'name' => $faker->word,
    'time' => $faker->dateTimeThisYear(), 
    'description' => $faker->paragraph(2), 
    'location' => $faker->city,
    'private' => $faker->boolean 
]);

$factory('freshwax\Models\Post', [
    'name' => $faker->word,
    'body' => $faker->paragraph(4), 
    'user_id' => "factory:freshwax\Models\User",
    'private' => $faker->boolean 
]);

$factory('freshwax\Models\Item', [
    'name' => $faker->word,
    'description' => $faker->paragraph(4), 
    'total' => $faker->randomFloat(2, 1, 100)
]);

$factory('freshwax\Models\Tag', [
    'tag' => $faker->word
]);