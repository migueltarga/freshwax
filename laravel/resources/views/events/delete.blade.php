@extends('layouts.master')

@section('content') 
	<article class="forms"> 
		<h1>Are You Sure You Want To Delete {!!$event->name!!}?</h1>
		{!!Form::open(["route"=>["events.destroy", $event->id], "method"=>"DELETE"])!!}
			{!!Form::submit("Delete")!!}
		{!!Form::close()!!}
	</article> 
@stop 
