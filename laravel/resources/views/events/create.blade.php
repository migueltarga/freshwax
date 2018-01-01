@extends('layouts.master')

@section('content')
	<article class="container-fluid">
		<header class="jumbotron">
		<h1><i class="fa fa-plus"></i> Event</h1>
		</header>
		{!!Form::open(['route'=>'events.store'])!!}
			@include('events.partials.form')

			<button type="submit" class="btn btn-primary pull-right">
				<i class="fa fa-plus"></i> Event
			</button>
		{!!Form::close()!!}

	</article>
@stop
