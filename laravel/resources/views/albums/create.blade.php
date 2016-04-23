@extends('layouts.master')

@section('content')
	<article class="forms"> 
		<header> 
			<h1>Create Album</h1>
		</header> 

		{!!Form::open(['route'=>'albums.store'])!!}
			@include('albums.partials.form')
			{!!Form::submit('create')!!}
		{!!Form::close()!!}

	</article> 
@stop
