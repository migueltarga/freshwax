<?php namespace freshwax\Http\Controllers;

use freshwax\Http\Requests;
use freshwax\Http\Controllers\Controller;
use freshwax\Http\Requests\TagCreateFormRequest;

use Request;

use freshwax\Models\Tag;
use freshwax\Models\Track;
use freshwax\Models\Album;
use freshwax\Models\Event;
use freshwax\Models\Post;
use freshwax\Models\Item;

use View;
use Input;
use Redirect;

class TagsController extends Controller {

    public function __construct()
    {
        $this->middleware('auth:artist');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tags = Tag::all();
        return View::make('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('tags.create');
    }

    public function album($id)
    {
        return View::make('tags.create.album', compact('id'));
    }

    public function track($id)
    {
        return View::make('tags.create.track', compact('id'));
    }

    public function event($id)
    {
        return View::make('tags.create.event', compact('id'));
    }

    public function post($id)
    {
        return View::make('tags.create.post', compact('id'));
    }

    public function item($id)
    {
        return View::make('tags.create.item', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(TagCreateFormRequest $request)
    {
        $existingtag = Tag::where('tag', '=', Input::get('tag'))->get();

        if(!$existingtag->isempty()){
            $tag = $existingtag[0];
        } else {
            $tag = Tag::create(Input::all());
        }


        if(Request::has('artist')){
            $artist = Artist::findOrFail(Input::get('artist'));
            $artist->tags()->attach($tag->id);
        }

        if(Request::has('album')){
            $album = Album::findOrFail(Input::get('album'));
            $album->tags()->attach($tag->id);
        }

        if(Request::has('track')){
            $track = Track::findOrFail(Input::get('track'));
            $track->tags()->attach($tag->id);
        }

        if(Request::has('event')){
            $event = Event::findOrFail(Input::get('event'));
            $event->tags()->attach($tag->id);
        }

        if(Request::has('post')){
            $post = Post::findOrFail(Input::get('post'));
            $post->tags()->attach($tag->id);
        }

        if(Request::has('item')){
            $item = Item::findOrFail(Input::get('item'));
            $item->tags()->attach($tag->id);
        }

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
        $tag = Tag::findOrFail($id);
        return View::make('tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return View::make('tags.edit', compact('tag'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
