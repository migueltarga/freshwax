@extends('layouts.master')

@section('content') 
	<article> 
		<h1>Are You Sure You Want To Delete {!!$track->name!!}?</h1>
		{!!Form::open(['route'=>["tracks.destroy", $track->id], 'method'=>'DELETE'])!!}
			{!!Form::submit('destroy')!!}
		{!!Form::close()!!}
	</article> 
@stop 