@extends('layouts.master')

@section('content')
	<article>
	<h1>{{$a->name}}</h1>
	<p>{{$a->description}}</p>
	<p>{{$a->personnel}}</p>

	@if($a->photos->count())

		@foreach($a->photos as $p)
			<img src="{{$p->path}}" />
		@endforeach

    @endif

    @foreach($a->tracks as $track)
        <h2>{{$track->name}}</h2>
    @endforeach

	@foreach($a->artists as $artist)
		<h2>{{$artist->name}}</h2>
	@endforeach

    @include('albums.partials.adminnav')

    </article>
@stop
