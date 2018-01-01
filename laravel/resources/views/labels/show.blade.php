@extends('layouts.master')

@section('content')
	<article>
		<header class="row jumbotron">
			<h1>{{$label->name}}</h1>
			<h2>{{$label->city}}</h2>
		</header>

		<p>{{$label->about}}</p>

        @include('labels.partials.adminnav')
	</article>
@stop
