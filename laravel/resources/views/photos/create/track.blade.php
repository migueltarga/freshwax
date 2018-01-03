@extends('layouts.master')

@section('content')
	<article>
		<header class="jumbotron">
			<h1><i class="fa fa-plus"></i> Track Photo</h1>
		</header>
		{!!Form::open(['route'=>'photos.store', 'files' => 'true'])!!}
			@include('photos.partials.form')
			{!!Form::hidden('track', $id)!!}
			<button type="submit" class="btn btn-primary pull-right">
				<i class="fa fa-plus"></i> Track Photo
			</button>
		{!!Form::close()!!}

	</article>
@stop
