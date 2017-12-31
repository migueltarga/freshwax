@extends('layouts.master')

@section('content')
	<article class="container-fluid">
		<header class="jumbotron">
			<h1>Create Post</h1>
		</header>
		{!!Form::open(['route'=>'posts.store'])!!}
			@include('posts.partials.form')
			{!!Form::submit('create')!!}
		{!!Form::close()!!}

	</article>
@stop
