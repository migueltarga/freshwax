@extends('layouts.master')

@section('content')
	<article> 
		<h1>Add Tags to Post</h1>

		{!!Form::open(['route'=>'tags.store'])!!}

			@include('tags.partials.form')

			{!!Form::hidden('post', $id)!!}

			{!!Form::submit('Add')!!}
		{!!Form::close()!!}

	</article> 
@stop