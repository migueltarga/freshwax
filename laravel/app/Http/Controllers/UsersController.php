<?php namespace freshwax\Http\Controllers;

use freshwax\Http\Requests;
use freshwax\Http\Controllers\Controller;
use freshwax\Http\Requests\UserCreateFormRequest;

use Illuminate\Support\Facades\Request;

use freshwax\Models\User;
use freshwax\Models\Artist;
use freshwax\Models\ShoppingCart;
use freshwax\Models\Wishlist;
use freshwax\Models\Order;

use Cookie;
use View;
use Input;
use Redirect;
use Auth;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
		return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$artists = Artist::all();
		$users = User::all();
		return View::make('users.create', compact('artists', 'users'));
	}

	public function login()
	{
        return View::make('auth.login');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UserCreateFormRequest $request)
	{
		$users = User::all();

		$user = User::create(Input::all());

		if($users->count() == 0){
			$user->isadmin = true;
			$forget = true;
			$forgetcart = Cookie::forget('cart');
			$forgetorder = Cookie::forget('continue_order');
		} else {
			$user->isadmin = false;
		}

		if(Request::cookie('cart') !== null){
			$cart = Request::cookie('cart');
			$forget = true;
			$forgetcart = Cookie::forget('cart');
		} else {
			$cart = new ShoppingCart;
			$forget = false;
		}

		$wishlist = new Wishlist;

		$cart->user()->associate($user);
		$wishlist->user()->associate($user);

		$cart->save();

		$wishlist->save();

		$user->save();

		Auth::attempt(['email'=>Input::get('email'), 'password' => Input::get('password')]);

		if(Request::cookie('continue_order')){

			if($user->isadmin){
				return Redirect::route('home.landing')->withCookie($forgetcart)->withCookied($forgetorder);
			}

			$order = new Order;

			$order->user()->associate($user);

			$order->total = $cart->total();

			$order->save();

			if($forget){
				return Redirect::route('addresses.create', $order->id)->withCookie($forgetcart);
			} else {
				return Redirect::route('addresses.create', $order->id);
			}

		} else if ($forget) {

			return Redirect::route('home.landing')->withCookie($forgetcart);
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
		$user = User::findOrFail($id);

		return View::make('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);

		return View::make('users.edit', compact('user'));
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

	public function delete($id)
	{

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
  	{
  	  Auth::logout();

  	  return Redirect::route('home.landing');
  	}

}
