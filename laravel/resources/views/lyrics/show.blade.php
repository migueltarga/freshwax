@extends('layouts.master') 

@section('content') 
	<article> 
		<header> 
			<h1>{{$lyric->track->name}}</h1>
		</header>
		<p>
			{{$lyric->lyrics}}
		</p> 
	</article> 
@stop 
