@extends('layouts.master')

@section('content')
	<article>
		<h1>Edit Album</h1>
        {!!Form::model($album, array('route' => array('albums.update', $album->id), 'method' => 'PUT'))!!}
			@include('albums.partials.form')
			{!!Form::submit('Edit')!!}
		{!!Form::close()!!}
	</article>
@stop
