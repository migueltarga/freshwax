@extends('layouts.master') 

@section('content') 
	<article class="forms"> 
		<header> 
			<h1>Create Video</h1>
		</header>

		{!!Form::open(['route'=>'videos.store'])!!} 
			@include('videos.partials.form')
			{!!Form::submit('create')!!}
		{!!Form::close()!!}
	
	</article> 
@stop 
