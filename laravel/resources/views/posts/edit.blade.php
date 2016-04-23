@extends('layouts.master')

@section('content')
	<article> 
		<h1>Edit Post</h1>
		{!!Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT'))!!}
			@include('posts.partials.form')
			{!!Form::submit('Edit')!!}
		{!!Form::close()!!}
	</article> 
@stop