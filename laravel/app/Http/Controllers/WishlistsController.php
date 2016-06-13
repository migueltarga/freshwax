<?php namespace freshwax\Http\Controllers;

use freshwax\Http\Requests;
use freshwax\Http\Controllers\Controller;

use Request;

use freshwax\Models\Wishlist; 
use freshwax\Models\Item; 

use Redirect;
use Input; 
use View; 
use Auth;

class WishlistsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$wishlists = Wishlist::all(); 
		return View::make('wishlists.index', compact('wishlists'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('wishlists.create');
	}

	public function additem(){ 
		if(!Auth::check()){ 
			return Redirect::route('login')->withErrors(['Need Account','Please Login or Create an Account']);
		} else { 
			Auth::user()->wishlist->items()->attach(Input::get('item_id')); 
			return Redirect::route('wishlists.show', Auth::user()->wishlist->id); 
		}
	}

	public function removeitem(){ 
		Auth::user()->wishlist->removeItem(Input::get('item_id')); 
		return Redirect::route('wishlists.show', Auth::user()->wishlist->id); 
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(WishlistCreateFormRequest $request)
	{
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$wishlist = Wishlist::findOrFail($id);
		return View::make('wishlists.show', compact('wishlist'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$wishlist = Wishlist::findOrFail($id);
		return View::make('wishlists.edit', compact('wishlist'));
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
