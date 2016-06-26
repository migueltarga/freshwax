<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('artists', 'ArtistsController');
Route::resource('lyrics', 'LyricsController');
Route::resource('videos', 'VideosController');
Route::resource('albums', 'AlbumsController');
Route::resource('tracks', 'TracksController');
Route::resource('posts', 'PostsController');
Route::resource('events', 'EventsController');
Route::resource('photos', 'PhotosController');
Route::resource('users', 'UsersController');
Route::resource('items', 'ItemsController');
Route::resource('shoppingcarts', 'ShoppingCartsController');
Route::resource('wishlists', 'WishlistsController');
Route::resource('orders', 'OrdersController');
Route::resource('tags', 'TagsController');
Route::resource('addresses', 'AddressesController', ['except'=>'create']);

Route::get('/artist/{id}/makeactive', array(
		'uses' => 'ArtistsController@makeactive',
        'as' => 'artists.makeactive',
        'middleware' => 'auth:artist'
	));

Route::get('/artist/{id}/addbanner', array(
		'uses' => 'PhotosController@makeartistbanner',
        'as' => 'artists.addbanner',
        'middleware' => 'auth:artist'
    ));

Route::get('/my/artists',array(
        'uses' => 'ArtistsController@userartists',
        'as' => 'artists.myartists',
        'middleware' => 'auth:artist'
    ));

Route::get('/addresses/{orderid}/order', array(
		'uses' => 'AddressesController@create',
        'as' => 'addresses.create',
        'middleware' => 'auth'
	));

Route::get('/addresses/{orderid}/order/shipping', array(
		'uses' => 'AddressesController@createshipping',
        'as' => 'addresses.createshipping',
        'middleware' => 'auth'
	));

Route::get('/addresses/{orderid}/order/billing', array(
		'uses' => 'AddressesController@createbilling',
        'as' => 'addresses.createbilling',
        'middleware' => 'auth'
	));

Route::get('/videos/delete/{id}', array(
		'uses' => 'VideosController@delete',
        'as' => 'videos.delete',
        'middleware' => 'auth:artist'
	));

Route::get('/lyrics/delete/{id}', array(
		'uses' => 'LyricsController@delete',
        'as' => 'lyrics.delete',
        'middleware' => 'auth:artist'
	));

Route::get('/items/delete/{id}', array(
		'uses' => 'ItemsController@delete',
        'as' => 'items.delete',
        'middleware' => 'auth:artist',
	));

Route::get('/orders/delete/{id}', array(
		'uses' => 'OrdersController@delete',
        'as' => 'orders.delete',
        'middleware' => 'auth:admin'
	));

Route::get('events/delete/{id}', array(
		'uses' => 'EventsController@delete',
        'as' => 'events.delete',
        'middleware' => 'auth:artist'
    ));

//ALBUMS

Route::get('albums/{id}/track', array(
        'uses' => 'AlbumsController@addTrack',
        'as' => 'albums.track.create',
        'middleware' => 'auth:artist'
    ));

Route::get('albums/delete/{id}', array(
		'uses' => 'AlbumsController@delete',
        'as' => 'albums.delete',
        'middleware' => 'auth:artist'
    ));

//ENDALBUMS

Route::get('artists/delete/{id}', array(
		'uses' => 'ArtistsController@delete',
        'as' => 'artists.delete',
        'middleware' => 'auth:admin'
	));

Route::get('photos/delete/{id}', array(
		'uses' => 'PhotosController@delete',
        'as' => 'photos.delete',
        'middleware' => 'auth:artist'
));

Route::get('posts/delete/{id}', array(
		'uses' => 'PostsController@delete',
        'as' => 'posts.delete',
        'middleware' => 'auth:artist'
	));

Route::get('tracks/delete/{id}', array(
		'uses' => 'TracksController@delete',
        'as' => 'tracks.delete',
        'middleware' => 'auth:artist'
	));

Route::post('/cart/add/items', array(
	'uses' => 'ShoppingCartsController@additem',
    'as' => 'shoppingcarts.additem',
));

Route::post('/wishlist/items', array(
	'uses' => 'WishlistsController@additem',
    'as' => 'wishlists.additem',
));

Route::post('/cart/remove/items', array(
	'uses' => 'ShoppingCartsController@removeitem',
	'as' => 'shoppingcarts.removeitem'
));

Route::post('/wishlist/remove/items', array(
	'uses' => 'WishlistsController@removeitem',
	'as' => 'wishlists.removeitem'
));


Route::get('/', array(
	'uses' => 'HomeController@index',
	'as' => 'home.landing'
));

Route::get('/home', array(
	'uses' => 'HomeController@index',
	'as' => 'home.landing'
));

Route::get('/login', array(
	'uses' => 'UsersController@login',
    'as' => 'login'
));

Route::get('/register', array(
    'uses' => 'UsersController@create',
    'as' => 'auth.register'
));

Route::get('artists/{id}/photos', array(
	'uses' => 'PhotosController@artist',
    'as' => 'photos.artist.create',
    'middleware' => 'auth:artist'
));

Route::get('albums/{id}/photos', array(
	'uses' => 'PhotosController@album',
    'as' => 'photos.album.create',
    'middleware' => 'auth:artist'
));

Route::get('tracks/{id}/photos', array(
	'uses' => 'PhotosController@track',
    'as' => 'photos.track.create',
    'middleware' => 'auth:artist'
));

Route::get('events/{id}/photos', array(
	'uses' => 'PhotosController@event',
    'as' => 'photos.event.create',
     'middleware' => 'auth:artist'
));

Route::get('posts/{id}/photos', array(
	'uses' => 'PhotosController@post',
    'as' => 'photos.post.create',
    'middleware' => 'auth:artist'
));

Route::get('items/{id}/photos', array(
	'uses' => 'PhotosController@item',
    'as' => 'photos.item.create',
     'middleware' => 'auth:artist'
));

Route::get('albums/{id}/tags', array(
	'uses' => 'TagsController@album',
    'as' => 'tags.album.create',
    'middleware' => 'auth:artist'
));

Route::get('tracks/{id}/tags', array(
	'uses' => 'TagsController@track',
    'as' => 'tags.track.create',
    'middleware' => 'auth:artist'
));

Route::get('posts/{id}/tags', array(
	'uses' => 'TagsController@post',
    'as' => 'tags.post.create',
    'middleware' => 'auth:artist'
));

Route::get('events/{id}/tags', array(
	'uses' => 'TagsController@event',
    'as' => 'tags.event.create',
    'middleware' => 'auth:artist'
));

Route::get('items/{id}/tags', array(
	'uses' => 'TagsController@item',
    'as' => 'tags.item.create',
    'middleware' => 'auth:artist'
));

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
