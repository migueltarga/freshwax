<?php namespace freshwax\Http\Controllers;

use freshwax\Http\Requests;
use freshwax\Http\Controllers\Controller;
use freshwax\Http\Requests\PostCreateFormRequest;

use Illuminate\Http\Request;

use freshwax\Post;

use View;
use Input;
use Redirect;
use Auth;

class PostsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::check() && Auth::user()->isadmin){
			$posts = Post::all();
		} else {
			$posts = Post::where('private', '=', 0)->get();
		}

		return View::make('posts.index', compact('posts'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PostCreateFormRequest $request)
	{
		$post = Post::create(Input::all());

		if(!Input::has('private')){
			$post->private = false;
		}

		$post->save();

		return Redirect::route('posts.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$p = Post::findOrFail($id);
		return View::make('posts.show', compact('p'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::findOrFail($id);
		return View::make('posts.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, PostCreateFormRequest $request)
	{
		$post =  Post::findOrFail($id);

		$post->name = Input::get('name');
		$post->body = Input::get('body');
		$post->private = Input::get('private');

		$post->save();

		return $this->show($id);
	}

	public function delete($id)
	{
		$post = Post::findOrFail($id);
		return View::make('posts.delete', compact('post'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::findOrFail($id);
		$post->delete();
		return $this->index();
	}

}
