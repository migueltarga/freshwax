@extends('layouts.master')

@section('content')
	<article>
		<header class="row jumbotron">
			<h1><i class="fa fa-plus"></i> Album</h1>
		</header>

		{!!Form::open(['route'=>'albums.store'])!!}
            @include('albums.partials.form')
			<button type="submit" class="btn btn-primary pull-right">
				<i class="fa fa-plus"></i> Album
			</button>
		{!!Form::close()!!}

	</article>
@stop
