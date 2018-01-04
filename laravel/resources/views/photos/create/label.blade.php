@extends('layouts.master')

@section('content')
	<article class="forms">
		<header class="jumbotron">
			<h1><i class="fa fa-plus"></i> Label Photo</h1>
		</header>
		{!!Form::open(['route'=>'photos.store', 'files' => 'true'])!!}
			@include('photos.partials.form')
			{!!Form::hidden('label', $id)!!}
			<button class="btn btn-primary" type="submit">Upload</button>
		{!!Form::close()!!}

	</article>
@stop
