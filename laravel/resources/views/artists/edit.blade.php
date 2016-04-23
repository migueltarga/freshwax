@extends('layouts.master')

@section('content')
	<article> 
		<h1>Edit Artist</h1>
		{!!Form::model($artist, array('route' => array('artists.update', $artist->id), 'method' => 'PUT'))!!}
			@include('artists.partials.form')
			{!!Form::submit('Edit')!!}
		{!!Form::close()!!}
	</article> 
@stop