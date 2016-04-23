<?php namespace freshwax\Http\Controllers;

use freshwax\Http\Requests;
use freshwax\Http\Controllers\Controller;
use freshwax\Http\Requests\EventCreateFormRequest;

use Illuminate\Http\Request;

use freshwax\Models\Event;

use DateTime; 
use View;
use Input;
use Redirect;
use Auth;

class EventsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::check() && Auth::user()->isadmin){
			$events = Event::all(); 
		} else { 
			$events = Event::where('private', '=', 0)->get();
		}

		return View::make('events.index', compact('events')); 
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('events.create'); 
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(EventCreateFormRequest $request)
	{
		$event = Event::create(Input::all()); 
		$time = new DateTime(Input::get('time')); 
		$event->time = $time->format('Y-m-d H:i:s');
		if(!Input::has('private')){
			$event->private = false; 
		}

		$event->save(); 

		return Redirect::route('events.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$e = Event::findOrFail($id); 

		return View::make('events.show', compact('e'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$event = Event::findOrFail($id); 

		return View::make('events.edit', compact('event'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, EventCreateFormRequest $request)
	{
		$event = Event::findOrFail($id); 

		$event->name = Input::get('name'); 
		$event->time = Input::get('time'); 
		$event->location = Input::get('location'); 
		$event->description = Input::get('description'); 
		$event->private = Input::get('private'); 

		$event->save(); 

		return $this->show($id); 
	}

	public function delete($id)
	{ 
		$event = Event::findOrFail($id); 

		return View::make('events.delete', compact('event'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$event = Event::findOrFail($id); 
		$event->delete();
		return $this->index(); 
	}

}
