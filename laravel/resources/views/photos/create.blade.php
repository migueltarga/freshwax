@extends('layouts.master')

@section('content')
	<article class="forms">
		<header class="jumbotron">
			<h1><i class="fa fa-plus"></i> Photo</h1>
		</header>

		{!!Form::open(['route'=>'photos.store', 'files' => 'true'])!!}
			@include('photos.partials.form')

			<button class="btn btn-primary" type="submit">Upload</button>
		{!!Form::close()!!}

	</article>
@stop
