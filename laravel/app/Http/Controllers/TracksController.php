<?php namespace freshwax\Http\Controllers;

use freshwax\Http\Requests;
use freshwax\Http\Controllers\Controller;
use freshwax\Http\Requests\TrackCreateFormRequest;

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
        $this->middleware('auth:artist');
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

        if( Input::hasFile('track') ){
            $track_file = Input::file('track');
            $track_path = public_path() . '/uploads/';
            $track_name = Input::get('name') . '.' . $track_file->getClientOriginalExtension();
            $track_file->move($track_path, $track_name);
            $track->path = realpath('/uploads/' . Input::get('name'));
        }

        //if it's not an mp3 it needs to be
        if(strcasecmp($track_file->getClientOriginalExtension(),"mp3") != 0){
            $convert_command = 'sox ' . $track->path . $track_file->getClientOriginalExtension() . ' ' . $track->path . '.mp3';
            exec($convert_command);
        }

        if( !Input::has('private') ){
            $track->private = false;
        }

        if( Input::has('album_id') ){
            $track->album()->associate(Album::findOrFail($request->album_id));
        }

        $activeartist = Artist::where('active_profile', '=', 1)->first();
        $track->save();

        $track->artists()->attach($activeartist->id);

        return Redirect::route('tracks.index');
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
    public function update($id)
    {
       $track = $this->fetch($id);

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
