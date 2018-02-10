<?php namespace freshwax\Http\Controllers;

use freshwax\Http\Requests;
use freshwax\Http\Controllers\Controller;
use freshwax\Http\Requests\TrackCreateFormRequest;
use freshwax\Http\Requests\TrackUpdateFormRequest;

use Illuminate\Http\Request;

use freshwax\Models\Artist;
use freshwax\Models\Album;
use freshwax\Models\Track;

use View;
use Input;
use Redirect;
use Auth;

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

        $track->path = $this->handleFile($track, $request);

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
        return redirect()->route('tracks.index');
    }

    public function handleFile($track, $request)
    {
        if( null !== $request->file('track') ){
            $track_file = $request->file('track');
			$track_path = '/uploads/';
			$track_full_path = public_path() . $track_path;
            $ext = $track_file->getClientOriginalExtension();
            $name = preg_replace("/[^a-zA-Z]+/", "", $request->name);
			$track_name = $name;
			$track_ext = '.' . $ext;
            $track_file->move($track_full_path, $track_name . $track_ext);

			$track->path = $track_path . $track_name;

			//if it's not an mp3 it needs to be
            if(strcasecmp($ext,"mp3") != 0){
				$convert_command = 'sox ' . $track_full_path . $track_name . $track_ext . ' ' . $track_full_path . $track_name . '.mp3';
				$output = [];
				exec($convert_command, $output);
			}

			$track->path = $track->path . '.mp3';

        } else {

			$track->path = '';
		}

        return $track->path;
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
