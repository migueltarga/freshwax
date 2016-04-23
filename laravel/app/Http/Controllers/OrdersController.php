<?php namespace freshwax\Http\Controllers;

use freshwax\Http\Requests\OrderCreateFormRequest;
use freshwax\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request;

use Redirect; 
use freshwax\Models\ShoppingCart; 
use freshwax\Models\Order; 
use Input;

class OrdersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::check() && Auth::user()->isadmin){ 
			$orders = Order::all(); 
		} else { 
			$orders = Auth::user()->orders; 
		} 
		return View::make('orders.index', compact('orders')); 
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('orders.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(OrderCreateFormRequest $request)
	{
		$cart = Shoppingcart::findOrFail(Input::get('shopping_cart_id')); 

		if($cart->user == null){ 
			return Redirect::route('users.create')
				->withErrors(['Please create an account to continue your order.'])
				->withCookie(cookie('continue_order', true));
		}
		$order = new Order; 
 
		$order->user()->associate($cart->user); 

		$order->total = $cart->total(); 

		$order->save(); 


		return Redirect::route('addresses.create', $order->id); 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$order = Order::findOrFail($id);
		return View::make("orders.show", compact('order')); 
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$order = Order::findOrFail($id); 
		return View::make("orders.edit", compact('order')); 
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
