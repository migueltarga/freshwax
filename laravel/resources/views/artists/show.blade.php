@extends('layouts.master')

@section('content')
	<article>
		<h1>{{$a->name}}</h1>
		<h2>{{$a->hometown}}</h2>
	    <p>{{$a->bio}}</p>

		@foreach($a->photos as $p)
			<img src="{{$p->path}}" />
		@endforeach
        @include('artists.partials.adminnav')
	</article>
@stop
