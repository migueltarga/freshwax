@extends('layouts.master')

@section('content')
	<article class="container-fluid">
		<header class="jumbotron">
			<h1><i class="fa fa-plus"></i> Artist</h1>
		</header>

		{!!Form::open(['route'=>'artists.store'])!!}
            @include('artists.partials.form')

			<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Artist</button>
		{!!Form::close()!!}

	</article>
@stop
