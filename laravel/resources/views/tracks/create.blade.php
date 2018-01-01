@extends('layouts.master')

@section('content')
	<article>
		<header class="row jumbotron">
			<h1><i class="fa fa-plus"></i> Track</h1>
		</header>

		{!!Form::open(['route'=>'tracks.store', 'files' => 'true'])!!}
			@include('tracks.partials.form')

			<button type="submit" class="btn btn-primary pull-right">
				<i class="fa fa-plus"></i> Track
			</button>
		{!!Form::close()!!}

	</article>
@stop
