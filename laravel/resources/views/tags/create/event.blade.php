@extends('layouts.master')

@section('content')
	<article> 
		<h1>Add Tags to Event</h1>

		{!!Form::open(['route'=>'tags.store'])!!}

			@include('tags.partials.form')

			{!!Form::hidden('event', $id)!!}

			{!!Form::submit('Add')!!}
		{!!Form::close()!!}

	</article> 
@stop
