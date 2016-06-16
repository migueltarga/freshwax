@extends('layouts.master')

@section('content')
    <article>
        <header>
            <h1>Edit Track</h1>
        </header>
        {!!Form::model($track, array('route' => array('tracks.update', $track->id), 'method' => 'PUT'))!!}
			@include('tracks.partials.form')
			{!!Form::submit('Edit')!!}
		{!!Form::close()!!}
	</article>
@stop
