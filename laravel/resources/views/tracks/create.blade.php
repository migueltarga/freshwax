@extends('layouts.master')

@section('content')
	<article class="container-fluid">
		<header class="jumbotron">
			<h1><i class="fa fa-plus"></i> Track</h1>
		</header>

		{!!Form::open(['route'=>'tracks.store', 'files' => 'true'])!!}
			@include('tracks.partials.form')
			{!!Form::submit('create')!!}
		{!!Form::close()!!}

	</article>
@stop
