@extends('layouts.master')

@section('content') 
	<article class="forms"> 
		<header> 
			<h1>Create Lyric</h1>
		</header> 

		{!!Form::open(['route'=>'lyrics.store'])!!}
			@include('lyrics.partials.form')
			{!!Form::submit('create')!!}
		{!!Form::close()!!}
	</article> 
@stop
