@extends('layouts.master')

@section('content') 
	<article> 
		<h1>Are You Sure You Want To Delete {!!$artist->name!!}?</h1>
		{!!Form::open(['route'=>["artists.destroy", $artist->id], 'method'=>'DELETE'])!!}
			{!!Form::submit('destroy')!!}
		{!!Form::close()!!}
	</article> 
@stop 