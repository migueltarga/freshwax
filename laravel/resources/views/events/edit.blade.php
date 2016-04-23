@extends('layouts.master')

@section('content')
	<article> 
		<h1>Edit Event</h1>
		{!!Form::model($event, array('route' => array('events.update', $event->id), 'method' => 'PUT'))!!}
			@include('events.partials.form')
			{!!Form::submit('Edit')!!}
		{!!Form::close()!!}
	</article> 
@stop