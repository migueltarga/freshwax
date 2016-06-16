@extends('layouts.master')

@section('content')
    <article>
        <header>
		    <h1>{{$track->name}}</h1>
            <h2>{{$track->album->name}}</h2>
        </header>
        @include('tracks.partials.adminnav')
	</article>
@stop
