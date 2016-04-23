@extends('layouts.master')

@section('content')
	<article class="forms">
		<header>  
		<h1>Create Event</h1>
		</header>
		{!!Form::open(['route'=>'events.store'])!!}
			@include('events.partials.form')
			{!!Form::submit('create')!!}
		{!!Form::close()!!}

	</article> 
@stop
