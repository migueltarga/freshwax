@extends('layouts.master')

@section('content')
	<article class="container-fluid">
		<header class="jumbotron">
			<h1>Create Your Artist Profile</h1>
			<h2>You Can Have More Than One!</h2>
		</header>

		{!!Form::open(['route'=>'artists.store'])!!}
            @include('artists.partials.form')
			{!!Form::submit('create')!!}
		{!!Form::close()!!}

	</article>
@stop
