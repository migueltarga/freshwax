@extends('layouts.master')

@section('content')
	<article>
		<header class="row jumbotron">
			<h1><i class="fa fa-plus"></i> Label</h1>
		</header>

		{!!Form::open(['route'=>'labels.store'])!!}
            @include('labels.partials.form')

			<button type="submit" class="btn btn-primary pull-right">
				<i class="fa fa-plus"></i> Label
			</button>
		{!!Form::close()!!}

	</article>
@stop
