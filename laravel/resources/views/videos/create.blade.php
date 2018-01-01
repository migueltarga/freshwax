@extends('layouts.master')

@section('content')
	<article>
		<header class="row jumbotron">
			<h1><i class="fa fa-plus"></i> Video</h1>
		</header>

		{!!Form::open(['route'=>'videos.store'])!!}
			@include('videos.partials.form')
			<button type="submit" class="btn btn-primary pull-right">
				<i class="fa fa-plus"></i> Video
			</button>
		{!!Form::close()!!}

	</article>
@stop
