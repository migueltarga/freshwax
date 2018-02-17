<?php namespace freshwax\Http\Controllers;

use freshwax\Http\Requests;
use freshwax\Http\Controllers\Controller;
use freshwax\Http\Requests\TrackCreateFormRequest;
use freshwax\Http\Requests\TrackUpdateFormRequest;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use freshwax\Models\Artist;
use freshwax\Models\Album;
use freshwax\Models\Track;
use freshwax\Jobs\ProcessTrackUpload;

use Auth;
use Input;
use Redirect;
use View;

class TracksController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetch($id)
    {
        return Track::findOrFail($id);
    }

    public function albums()
    {
        return Album::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->isadmin){
            $tracks = Track::all();
        } else {
            $tracks = Track::where('private', '=', 0)->get();
        }
        return View::make('tracks.index', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $artists = Artist::all();
        $albums = $this->albums();
        return View::make('tracks.create', compact('artists','albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(TrackCreateFormRequest $request)
    {
		$track = Track::create(Input::except('track'));

		$track->user()->associate(Auth::user());

		$file_provided = null !== $request->file('track');

        if( $file_provided ){

			$track_file = $request->file('track');
			$track->file_name = preg_replace("/[^a-zA-Z]+/", "", $request->name);

			$ext = $track_file->getClientOriginalExtension();
			$track->ext = '.' . $ext;
			$track->original_ext = '.' . $ext;

			Storage::putFileAs('tracks_to_upload',  $track_file, $track->file_name . $track->ext);

		}

		if( !$request->filled('private') ){
            $track->private = false;
        }

        if( $request->filled('album_id') ){
            $track->album()->associate(Album::findOrFail($request->album_id));
        }

		if($request->filled('artist_id')){
            $track->artists()->attach(Artist::findOrFail($request->artist_id));
		} else {
			$activeartist = Artist::where('active_profile', '=', 1)->first();
			$track->artists()->attach($activeartist->id);
		}

		$track->save();

        if( $file_provided ){
			ProcessTrackUpload::dispatch($track);
		}

        return redirect()->route('tracks.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $track = $this->fetch($id);


        return View::make('tracks.show', compact('track'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $track = $this->fetch($id);
        $albums = $this->albums();
        return View::make('tracks.edit', compact('track'), compact('albums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, TrackCreateFormRequest $request)
    {
        $track = $this->fetch($id);
        $track = $this->handleFile($track);
        $track->save();
        return Redirect::route('tracks.show', compact('track')); //
    }

    public function delete($id)
    {
        $track = Track::findOrFail($id);
        return View::make('tracks.delete', compact('track'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $track = Track::findOrFail($id);
        $track->delete();
        return $this->index();
    }

}
