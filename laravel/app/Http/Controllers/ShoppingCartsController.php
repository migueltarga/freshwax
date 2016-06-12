<?php namespace freshwax\Http\Controllers;

use freshwax\Http\Requests;
use freshwax\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request;

use freshwax\ShoppingCart;

use View;

use Auth;
use Redirect;
use Input;

class ShoppingCartsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$carts = Shoppingcart::all();
		return View::make('shopping_carts.index', compact('carts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('shopping_carts.create');
	}

	public function additem(){
		if(Request::cookie('cart') !== null){

			$cart = Request::cookie('cart');


		} else if(!Auth::check()){

			$cart = ShoppingCart::create([]);

		} else {

			if(Auth::user()->wishlist->hasItem(Input::get('item_id'))){
				Auth::user()->wishlist->removeItem(Input::get('item_id'));
			}

			$cart = Auth::user()->cart->items()->attach(Input::get('item_id'));
			return Redirect::route('shoppingcarts.show', Auth::user()->cart->id);
		}

		$cart->items()->attach(Input::get('item_id'));
		return Redirect::route('shoppingcarts.show', $cart->id)->withCookie(cookie('cart', $cart));
	}

	public function removeitem(){

		if(Auth::check()){

			$cart = Auth::user()->cart->items->detach(Input::get('item_id'));
			return Redirect::route('shoppingcarts.show', Auth::user()->cart->id);

		} else if(Request::cookie('cart') !== null) {

			$cart = Request::cookie('cart');
			$cart->items()->detach(Input::get('item_id'));
			return Redirect::route('shoppingcarts.show', $cart->id);
		}


	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ShoppingCartCreateFormRequest $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$cart = Shoppingcart::findOrFail($id);
		return View::make('shopping_carts.show', compact('cart'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
