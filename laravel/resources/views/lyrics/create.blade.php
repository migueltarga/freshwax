@extends('layouts.master')

@section('content')
	<article class="container-fluid">
		<header class="jumbotron">
			<h1>Create Lyric</h1>
		</header>

		{!!Form::open(['route'=>'lyrics.store'])!!}
			@include('lyrics.partials.form')
			{!!Form::submit('create')!!}
		{!!Form::close()!!}
	</article>
@stop
