@extends('layouts.master')

@section('content')
	<article class="container-fluid">
		<header class="jumbotron">
			<h1><i class="fa fa-plus"></i> Album</h1>
		</header>

		{!!Form::open(['route'=>'albums.store'])!!}
            @include('albums.partials.form')
			{!!Form::submit('create')!!}
		{!!Form::close()!!}

	</article>
@stop
