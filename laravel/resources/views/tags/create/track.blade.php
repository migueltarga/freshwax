@extends('layouts.master')

@section('content')
	<article>
		<header class="row jumbotron">
			<h1><i class="fa fa-plus"></i> Track Tag</h1>
		</header>

		{!!Form::open(['route'=>'tags.store'])!!}

			@include('tags.partials.form')

			{!!Form::hidden('track', $id)!!}

			<button type="submit" class="btn btn-primary pull-right">
				<i class="fa fa-plus"></i> Track Tag
			</button>
		{!!Form::close()!!}
	</article>
@stop
