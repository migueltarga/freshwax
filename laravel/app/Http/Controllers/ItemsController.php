<?php namespace freshwax\Http\Controllers;

use freshwax\Http\Requests\ItemCreateFormRequest;
use freshwax\Http\Controllers\Controller;

use Request;

use freshwax\Models\Item; 

use View;
use Input;
use Redirect;

class ItemsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$items = Item::all(); 
		return View::make('items.index', compact('items')); 
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('items.create'); 
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ItemCreateFormRequest $request)
	{
		$item = Item::create(Input::all()); 

		return Redirect::route('items.show', $item->id);  
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$i = Item::findOrFail($id); 
		return View::make('items.show', compact('i')); 
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$item = Item::findOrFail($id); 
		return View::make('items.edit', compact('item')); 
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, ItemCreateFormRequest $request)
	{
		$item = Item::findOrFail($id); 

		$item->name = Input::get('name'); 
		$item->description = Input::get('description'); 
		$item->total = Input::get('total'); 

		$item->save(); 

		return Redirect::route('items.show', $item->id); 
	}

	public function delete($id){ 
		$item = Item::findOrFail($id); 
		return View::make('items.delete', compact(('item')));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$item = Item::findOrFail($id); 
		$item->delete(); 
		return Redirect::route('items.index');
	}

}
