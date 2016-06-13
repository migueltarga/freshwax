<?php namespace freshwax\Http\Controllers;

use freshwax\Http\Requests\AddressCreateFormRequest;
use freshwax\Http\Controllers\Controller;

use Request;
use freshwax\Models\Order; 
use freshwax\Models\Address; 
use freshwax\Models\City; 

use View; 
use Input; 
use Redirect; 
use Auth;

class AddressesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$addresses = Address::all(); 
		return View::make('addresses.index', compact('addresses')); 
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($orderid)
	{
		$order = Order::findOrFail($orderid); 
		return View::make('addresses.create', compact('order'));
	}

	public function createshipping($orderid) 
	{ 
		$order = Order::findOrFail($orderid);
		return View::make('addresses.createshipping', compact('order'));  
	} 

	public function createbilling($orderid) 
	{ 
		$order = Order::findOrFail($orderid); 
		return View::make('addresses.createbilling', compact('order'));
	} 

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AddressCreateFormRequest $request)
	{
		$address = new Address; 
		$address->street = Input::get('street');
		$address->additional = Input::get('street_additional');
		$address->zip = Input::get('zip');
		$city = City::where('zip','=',$address->zip)->firstOrFail();	
		$address->state = $city->state_code; 
		$address->city = $city->city; 
		$address->user_id = Input::get('user_id');

		if(Input::has('billing')){
			$address->billing = true; 	
			$billing = true; 
		} else { 
			$address->billing = false; 	
		}

		if(Input::has('shipping')){
			$address->shipping = true; 	
			$shipping = true; 
		} else { 
			$address->shipping = false; 	
		}

		if(!isset($billing) && !isset($shipping)){
			$address->shipping = true; 	
			$address->billing = true;
			$done = true; 
		}

		$address->save(); 
		$order = Order::findOrFail(Input::get('order_id')); 
		$order->addresses()->attach($address->id, ['shipping'=>$address->shipping, 'billing'=>$address->billing]);

		if(isset($done)){ 
			return Redirect::route('orders.show', $order->id);
		} else {
			if(isset($billing)){ 
				return Redirect::route('addresses.createshipping', $order->id)->withErrors(['Please add a shipping addresss.']);	
			}  
			if(isset($shipping)){ 
				
				return Redirect::route('addresses.createbilling', $order->id)->withErrors(['Please add a billing addresss.']);
			} 
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$address = Address::findOrFail($id); 

		return View::make('addresses.edit', compact('address')); 
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
