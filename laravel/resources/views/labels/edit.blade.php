@extends('layouts.master')

@section('content')
	<article>
		<header class="jumbotron">
			<h1><i class="fa fa-pencil"></i> {!! $artist->name !!}</h1>
		</header>
        {!!Form::model($artist, array('route' => array('artists.update', $artist->id), 'method' => 'PUT'))!!}
			@include('artists.partials.form')
			{!!Form::submit('Edit')!!}
		{!!Form::close()!!}
	</article>
@stop
