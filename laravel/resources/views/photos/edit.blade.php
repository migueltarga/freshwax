@extends('layouts.master')

@section('content')
	<article class="forms">
		<header>
			<h1>Edit Photo</h1>
        </header>
        {!!Form::model($photo, array('route' => array('photos.update', $photo->id), 'method' => 'PUT'))!!}
			@include('photos.partials.form')
			{!!Form::submit('edit')!!}
		{!!Form::close()!!}

	</article>
@stop
