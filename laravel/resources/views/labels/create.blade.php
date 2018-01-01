@extends('layouts.master')

@section('content')
	<article class="container-fluid">
		<header class="jumbotron">
			<h1><i class="fa fa-plus"></i> Label</h1>
		</header>

		{!!Form::open(['route'=>'labels.store'])!!}
            @include('labels.partials.form')

			<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Label</button>
		{!!Form::close()!!}

	</article>
@stop