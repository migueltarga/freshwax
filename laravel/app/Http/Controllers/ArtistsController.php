<?php namespace freshwax\Http\Controllers;

use freshwax\Http\Requests;
use freshwax\Http\Controllers\Controller;
use freshwax\Http\Requests\ArtistCreateFormRequest;

use Illuminate\Http\Request;

use freshwax\Models\User;
use freshwax\Models\Artist;

use Illuminate\Support\Facades\Auth;

use View;
use Input;
use Redirect;
use Config;

class ArtistsController extends Controller {

    public function __construct()
    {
        $this->middleware('auth:artist');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $artists = Artist::all();

        if($artists->count() == 0){
            return $this->create()->withErrors(['Please create an artist profile...']);
        }

        $userArtists = $request->user()->artists;

        return View::make('artists.index', compact('artists','userArtists'));
    }

    public function userartists()
    {
        $artists = Auth::user()->artists;
        return View::make('artists.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('artists.create');
    }

    public function makeactive($id){

        if(Auth::check() && Auth::user()->isadmin){

            $artists = Artist::all();

            foreach($artists as $a){
                if($a->active_profile){
                    $a->active_profile = false;
                    $a->save();
                }
            }

            $artist = Artist::findOrFail($id);
            $artist->active_profile = true;
            $artist->save();

            return Redirect::route('artists.index');

        } else {

            return Redirect::back();

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ArtistCreateFormRequest $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $artists = Artist::all();
        $artist = Artist::create(Input::all());
        $artist->user()->associate($user->id);
        if($artists->count() == 0){
            $artist->active_profile = true;
        }
        $artist->update();
        if(!$user->isartist){
            $user->isartist = true;
            $user->save();
        }
        return Redirect::route('artists.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $a = Artist::findOrFail($id);
        $albums = $a->albums;
        $posts = $a->posts;
        $events = $a->events;
        $videos = $a->videos;
        $lyrics = $a->lyrics;
        return View::make('artists.show', compact('a','albums','posts','events','videos','lyrics'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $artist = Artist::findOrFail($id);

        return View::make('artists.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, ArtistCreateFormRequest $request)
    {
        $artist = Artist::findOrFail($id);

        $artist->name = Input::get('name');
        $artist->bio = Input::get('bio');
        $artist->hometown = Input::get('hometown');

        $artist->save();

        return $this->show($artist->id);
    }

    public function delete($id)
    {
        $artist = Artist::findOrFail($id);
        return View::make('artists.delete', compact('artist'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $artist = Artist::findOrFail($id);
        $artist->delete();
        return $this->index();
    }

}
