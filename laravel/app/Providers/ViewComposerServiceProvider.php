<?php namespace freshwax\Providers;

use Illuminate\Support\ServiceProvider;

use freshwax\Models\Artist;
use freshwax\Models\Album;
use freshwax\Models\Track;
use freshwax\Models\Label;
use freshwax\Models\Lyric;
use freshwax\Models\Item;
use freshwax\Models\Post;
use freshwax\Models\Event;
use freshwax\Models\Video;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->composeLayout();
		$this->composeHeader();
		$this->composeNav();
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	public function composeLayout()
	{
		view()->composer('layouts.master', function($view){
			$activeartist = Artist::where('active_profile', '=', 1)->first();
			if($activeartist==null){
				$activeartist = new Artist;
				$activeartist->name="Unset";
			}

			$view->with('activeartist', $activeartist);
		});
	}

	public function composeHeader()
	{
		view()->composer('layouts.partials.header', function($view){
			$activeartist = Artist::where('active_profile', '=', 1)->first();
			if($activeartist==null){
				$activeartist = new Artist;
				$activeartist->name='Welcome to your new site, please create your artist profile!';
			}
			$view->with('activeartist', $activeartist);
		});
	}

	public function composeNav()
	{
		view()->composer('layouts.partials.nav', function($view){
            $artists = Artist::all();
            $albums = Album::all();
			$tracks = Track::all();
			$events = Event::all();
			$labels = Label::all();
			$lyrics = Lyric::all();
			$posts = Post::all();
			$items = Item::all();
			$videos = Video::all();

            $view->with('artists', $artists);
			$view->with('albums', $albums);
			$view->with('tracks', $tracks);
			$view->with('events', $events);
			$view->with('labels', $labels);
			$view->with('lyrics', $lyrics);
			$view->with('posts', $posts);
			$view->with('items', $items);
			$view->with('videos', $videos);
		});
	}

}
