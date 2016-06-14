<?php namespace freshwax\Http\Controllers;

use freshwax\Http\Requests;
use freshwax\Http\Controllers\Controller;
use freshwax\Http\Requests\AlbumCreateFormRequest;
use freshwax\Http\Requests\AlbumUpdateFormRequest;

use Illuminate\Http\Request;

use freshwax\Models\Track;
use freshwax\Models\Album;
use freshwax\Models\Artist;

use View;
use Input;
use Redirect;
use Auth;

class AlbumsController extends Controller {

    public function __construct()
    {
        $this->middleware('auth:artist');
    }

    //bet theres a generic way to write this in Controller
    private function fetch($id)
    {
        return Album::findOrFail($id);
    }

    public function addTrack($id)
    {
        $album = $this->fetch($id);
        $tracks = Track::all();
        return View::make('tracks.create.album', compact('album','tracks'));
    }

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
        $a = $this->fetch($id);

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
    public function update($id, AlbumUpdateFormRequest $request)
    {
        $album = $this->fetch($id);

        if(isset($request->track_id)){
            $track = Track::findOrFail($request->track_id);
            $album->tracks()->save($track);
        } else {
            $album->name = Input::get('name');
            $album->release_date = Input::get('release_date');
            $album->description = Input::get('description');
            $album->personnel = Input::get('personnel');
            $album->private = Input::get('private');
        }

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
