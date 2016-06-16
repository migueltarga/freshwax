@extends('layouts.master')

@section('content')
	<article>
		<header>
            <h1>{{$lyric->track->name}}</h1>
            <h2>{{$lyric->track->album->name}}</h2>
            @include('lyrics.partials.adminnav')
		</header>
		<p>
			{{$lyric->lyrics}}
        </p>
	</article>
@stop
