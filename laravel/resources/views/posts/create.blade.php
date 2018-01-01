@extends('layouts.master')

@section('content')
	<article>
		<header class="row jumbotron">
			<h1><i class="fa fa-plus"></i> Post</h1>
		</header>
		{!!Form::open(['route'=>'posts.store'])!!}
			@include('posts.partials.form')

			<button type="submit" class="btn btn-primary pull-right">
				<i class="fa fa-plus"></i> Post
			</button>
		{!!Form::close()!!}

	</article>
@stop
