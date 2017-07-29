@extends('layouts.master')

@section('content')
	<article class="forms container-fluid">
		<header class="jumbotron">
			<h1>Create Tracks</h1>
		</header>

		{!!Form::open(['route'=>'tracks.store', 'files' => 'true'])!!}
			@include('tracks.partials.form')
			{!!Form::submit('create')!!}
		{!!Form::close()!!}

	</article>
@stop
