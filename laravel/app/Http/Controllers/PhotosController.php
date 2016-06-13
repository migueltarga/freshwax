<?php namespace freshwax\Http\Controllers;

use freshwax\Http\Requests;
use freshwax\Http\Controllers\Controller;
use freshwax\Http\Requests\PhotoCreateFormRequest;

use freshwax\Models\Photo;
use freshwax\Models\Artist;
use freshwax\Models\Album;
use freshwax\Models\Track;
use freshwax\Models\Post;
use freshwax\Models\Event;
use freshwax\Models\Item;

use View;
use Input;
use Redirect;
use Image;
use Request;

class PhotosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$photos = Photo::all();
		return View::make('photos.index', compact('photos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('photos.create');
	}

	public function artist($id)
	{
		return View::make('photos.create.artist', compact('id'));
	}

	public function makeartistbanner($id)
	{
		return View::make('photos.create.artistbanner', compact('id'));
	}

	public function album($id)
	{
		return View::make('photos.create.album', compact('id'));
	}

	public function track($id)
	{
		return View::make('photos.create.track', compact('id'));
	}

	public function event($id)
	{
		return View::make('photos.create.event', compact('id'));
	}

	public function post($id)
	{
		return View::make('photos.create.post', compact('id'));
	}

	public function item($id)
	{
		return View::make('photos.create.item', compact('id'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PhotoCreateFormRequest $request)
	{

		if($request->hasFile('photo')){
			$photo = Input::file('photo');
			$photo_path = public_path() . '/uploads/';
			$photo_name = str_random(10) . date('Y-m-d') . '.' . $photo->getClientOriginalExtension();
			$photo->move($photo_path, $photo_name);
            $img = Image::make( $photo_path . $photo_name);
			$img->save();

		} else {

			return Redirect::back()->withErrors(array("Please include an image!"))->withInput();

		}

		$photo = Photo::create(Input::except(['artist', 'album', 'track', 'event', 'post', 'item', 'banner_override']));

		if(!Input::has('banner')){
			$photo->banner = false;
		}
		if(!Input::has('background')){
			$photo->background = false;
		}
		$photo->path = '/uploads/' . $photo_name;

		if(Request::has('artist')){
			$artist = Artist::findOrFail(Input::get('artist'));
			$photo->artist()->associate($artist);
		}

		if(Request::has('album')){
			$album = Album::findOrFail(Input::get('album'));
			$photo->album()->associate($album);
		}

		if(Request::has('track')){
			$track = Track::findOrFail(Input::get('track'));
			$photo->track()->associate($track);
		}

		if(Request::has('event')){
			$event = Event::findOrFail(Input::get('event'));
			$photo->event()->associate($event);
		}

		if(Request::has('post')){
			$post = Post::findOrFail(Input::get('post'));
			$photo->post()->associate($post);
		}

		if(Request::has('item')){
			$item = Item::findOrFail(Input::get('item'));
			$photo->item()->associate($item);
		}

		if(Request::has('banner_override')){
			$photo->banner = true;
		}

		if(Request::has('background_override')){
			$photo->background = true;
		}

		$photo->save();

		return Redirect::route('home.landing');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	public function delete($id)
	{
		$photo = Photo::findOrFail($id);
		return View::make('photos.delete', compact('photo'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$photo = Photo::findOrFail($id);
		$photo->delete();
		return $this->index();
	}

}
