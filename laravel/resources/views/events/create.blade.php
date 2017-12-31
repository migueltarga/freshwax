@extends('layouts.master')

@section('content')
	<article class="container-fluid">
		<header class="jumbotron">
		<h1>Create Event</h1>
		</header>
		{!!Form::open(['route'=>'events.store'])!!}
			@include('events.partials.form')
			{!!Form::submit('create')!!}
		{!!Form::close()!!}

	</article>
@stop
