<?php namespace freshwax\Http\Controllers;

use freshwax\Http\Requests\LyricsCreateFormRequest;
use freshwax\Http\Controllers\Controller;

use Illuminate\Http\Request;

use freshwax\Models\Lyric;
use freshwax\Models\Track;  

use View;
use Redirect;  
use Input; 

class LyricsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lyrics = Lyric::all(); 
		return View::make('lyrics.index', compact('lyrics')); 
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$tracks = Track::all(); 
		
		if($tracks->count() == 0){ 
			return Redirect::route('tracks.create')->withErrors(['Please create a track before adding lyrics for it.']);
		} 

		return View::make('lyrics.create', compact('tracks'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(LyricsCreateFormRequest $request)
	{
		$lyric = Lyric::create(Input::all());
		
		return $this->index(); 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$lyric = Lyric::findOrFail($id); 
		return View::make('lyrics.show', compact('lyric'));
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
		$lyric = Lyric::findOrFail($id);
		return View::make('lyrics.delete', compact('lyric')); 
	} 

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$lyric = Lyric::findOrFail($id);
		$lyric->delete(); 
		return $this->index();
	}
}
