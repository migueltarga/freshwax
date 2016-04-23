@extends('layouts.master')

@section('content')
	<article> 
		<h1>Add Tags to Track</h1>
		{!!Form::open(['route'=>'tags.store'])!!}

			@include('tags.partials.form')

			{!!Form::hidden('track', $id)!!}

			{!!Form::submit('Add')!!}
		{!!Form::close()!!}
	</article> 
@stop