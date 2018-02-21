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
Auth::routes();


//API Routes

//public register
Route::post('api/v1/register',array(
	'uses' => 'API\AuthController@register',
	'as' => 'api.register',
	'middleware' => 'cors'
));

Route::group(['prefix' => 'api/v1', 'middleware' => 'auth:api'], function () {


});
//END API Routes

Route::resource('artists', 'ArtistsController');
Route::resource('labels', 'LabelsController');
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
        'middleware' => 'auth'
	));

Route::get('/artist/{id}/addbanner', array(
		'uses' => 'PhotosController@makeartistbanner',
        'as' => 'artists.addbanner',
        'middleware' => 'auth'
    ));

Route::get('/my/artists',array(
        'uses' => 'ArtistsController@userartists',
        'as' => 'artists.myartists',
        'middleware' => 'auth'
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

Route::get('/labels/delete/{id}', array(
		'uses' => 'LabelsController@delete',
        'as' => 'labels.delete',
        'middleware' => 'auth'
	));

Route::get('/videos/delete/{id}', array(
		'uses' => 'VideosController@delete',
        'as' => 'videos.delete',
        'middleware' => 'auth'
	));

Route::get('/lyrics/delete/{id}', array(
		'uses' => 'LyricsController@delete',
        'as' => 'lyrics.delete',
        'middleware' => 'auth'
	));

Route::get('/items/delete/{id}', array(
		'uses' => 'ItemsController@delete',
        'as' => 'items.delete',
        'middleware' => 'auth',
	));

Route::get('/orders/delete/{id}', array(
		'uses' => 'OrdersController@delete',
        'as' => 'orders.delete',
        'middleware' => 'auth'
	));

Route::get('events/delete/{id}', array(
		'uses' => 'EventsController@delete',
        'as' => 'events.delete',
        'middleware' => 'auth'
    ));

//ALBUMS

Route::get('albums/{id}/track', array(
        'uses' => 'AlbumsController@addTrack',
        'as' => 'albums.track.create',
        'middleware' => 'auth'
    ));

Route::get('albums/delete/{id}', array(
		'uses' => 'AlbumsController@delete',
        'as' => 'albums.delete',
        'middleware' => 'auth'
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
        'middleware' => 'auth'
));

Route::get('posts/delete/{id}', array(
		'uses' => 'PostsController@delete',
        'as' => 'posts.delete',
        'middleware' => 'auth'
	));

Route::get('tracks/delete/{id}', array(
		'uses' => 'TracksController@delete',
        'as' => 'tracks.delete',
        'middleware' => 'auth'
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


//Auth, Registration & Permission Routes
Route::get('/register', array(
	'uses' => 'HomeController@register',
	'as' => 'home.register'
));

Route::get('/login', array(
	'uses' => 'UsersController@login',
    'as' => 'login'
));

Route::get('/register/listener', array(
    'uses' => 'UsersController@createListener',
    'as' => 'auth.register.listener'
));

Route::get('/register/artist', array(
    'uses' => 'UsersController@createArtist',
    'as' => 'auth.register.artist'
));

Route::get('/register/label', array(
    'uses' => 'UsersController@createLabel',
    'as' => 'auth.register.label'
));

Route::get('/users/{id}/roles', array(
	'uses' => 'UsersController@addRole',
	'as' => 'users.role.add'
));

Route::post('users/roles', array(
	'uses' => 'UsersController@storeRole',
	'as' => 'users.role.store'
));

//Begin Photo Endpoints
Route::get('labels/{id}/photos', array(
	'uses' => 'PhotosController@label',
    'as' => 'photos.label.create',
    'middleware' => 'auth'
));

Route::get('artists/{id}/photos', array(
	'uses' => 'PhotosController@artist',
    'as' => 'photos.artist.create',
    'middleware' => 'auth'
));

Route::get('albums/{id}/photos', array(
	'uses' => 'PhotosController@album',
    'as' => 'photos.album.create',
    'middleware' => 'auth'
));

Route::get('tracks/{id}/photos', array(
	'uses' => 'PhotosController@track',
    'as' => 'photos.track.create',
    'middleware' => 'auth'
));

Route::get('events/{id}/photos', array(
	'uses' => 'PhotosController@event',
    'as' => 'photos.event.create',
     'middleware' => 'auth'
));

Route::get('posts/{id}/photos', array(
	'uses' => 'PhotosController@post',
    'as' => 'photos.post.create',
    'middleware' => 'auth'
));

Route::get('items/{id}/photos', array(
	'uses' => 'PhotosController@item',
    'as' => 'photos.item.create',
     'middleware' => 'auth'
));

Route::get('albums/{id}/tags', array(
	'uses' => 'TagsController@album',
    'as' => 'tags.album.create',
    'middleware' => 'auth'
));

Route::get('tracks/{id}/tags', array(
	'uses' => 'TagsController@track',
    'as' => 'tags.track.create',
    'middleware' => 'auth'
));

Route::get('posts/{id}/tags', array(
	'uses' => 'TagsController@post',
    'as' => 'tags.post.create',
    'middleware' => 'auth'
));

Route::get('events/{id}/tags', array(
	'uses' => 'TagsController@event',
    'as' => 'tags.event.create',
    'middleware' => 'auth'
));

Route::get('items/{id}/tags', array(
	'uses' => 'TagsController@item',
    'as' => 'tags.item.create',
    'middleware' => 'auth'
));

Route::get('/home', 'HomeController@index');
