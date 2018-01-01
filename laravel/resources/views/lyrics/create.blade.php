@extends('layouts.master')

@section('content')
	<article>
		<header class="row jumbotron">
			<h1><i class="fa fa-plus"></i> Lyrics</h1>
		</header>

		{!!Form::open(['route'=>'lyrics.store'])!!}
			@include('lyrics.partials.form')

			<button type="submit" class="btn btn-primary pull-right">
				<i class="fa fa-plus"></i> Lyrics
			</button>
		{!!Form::close()!!}
	</article>
@stop
