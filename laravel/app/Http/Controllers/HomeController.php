<?php namespace freshwax\Http\Controllers;

use View;
use Input;
use Redirect;

use freshwax\Models\Album; 
use freshwax\Models\Track; 
use freshwax\Models\Post; 
use freshwax\Models\Event; 

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home.home');
	}

	public function lounge()
	{ 
		$albums = Album::where('private', '=', 1)->get();
		$tracks = Track::where('private', '=', 1)->get();
		$posts = Post::where('private', '=', 1)->get();
		$events = Event::where('private', '=', 1)->get();
		return View::make('home.lounge', compact('albums', 'tracks', 'posts', 'events'));
	}

}
