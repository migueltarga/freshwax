<?php namespace freshwax\Http\Controllers;

use freshwax\Http\Requests;
use freshwax\Http\Controllers\Controller;
use freshwax\Http\Requests\AlbumCreateFormRequest;

use Illuminate\Http\Request;

use freshwax\Album;
use freshwax\Artist;

use View;
use Input;
use Redirect;
use Auth;

class AlbumsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		if(Auth::check() && Auth::user()->isadmin){
			$albums = Album::all();
		} else {
			$albums = Album::where('private', '=', 0)->get();
		}

		return View::make('albums.index', compact('albums'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$artists = Artist::all();
		return View::make('albums.create', compact('artists'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AlbumCreateFormRequest $request)
	{
		$album = Album::create(Input::all());

		$album->artists()->attach(Input::get('artist_id'));

		return Redirect::route('albums.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$a = Album::findOrFail($id);

		return View::make('albums.show', compact('a'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$album = Album::findOrFail($id);
		$artists = Artist::all();

		return View::make('albums.edit', compact('album', 'artists'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, AlbumCreateFormRequest $request)
	{
		$album = Album::findOrFail($id);

		$album->name = Input::get('name');
		$album->release_date = Input::get('release_date');
		$album->description = Input::get('description');
		$album->personnel = Input::get('personnel');
		$album->private = Input::get('private');

		$album->save();

		return $this->show($album->id);
	}

	public function delete($id)
	{
		$album = Album::findOrFail($id);

		return View::make('albums.delete', compact('album'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$album = Album::findOrFail($id);
		$album->delete();
		return $this->index();
	}

}
