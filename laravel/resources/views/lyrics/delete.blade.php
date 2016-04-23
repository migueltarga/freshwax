@extends('layouts.master') 

@section('content') 
	<article class="forms"> 

		<header> 
			<h1>Are you sure you want to delete lyrics for {{$lyric->track->name}}?</h1>
		</header>
 
		{!!Form::open(['route'=>['lyrics.destroy', $lyric->id], 'method'=>'DELETE'])!!}
			{!!Form::submit('Delete')!!}
		{!!Form::close()!!}

	</article> 
@stop
