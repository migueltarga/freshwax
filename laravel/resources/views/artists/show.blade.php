@extends('layouts.master')

@section('content')
	<article class="row">

		<header class="jumbotron col-md-12">
			<div class="col-md-3">
			@foreach($artist->photos as $p)
				<img src="{{$p->path}}" class="img-responsive img-circle" />
				@break;
			@endforeach
			</div>

			<div class="col-md-9">
				<h1>{{$artist->name}}</h1>
				<h2>{{$artist->hometown}}</h2>
			</div>
		</header>

		@include('artists.partials.adminnav')

		<div class="col-md-4">
			<h1>Bio:</h1>
			<p>{{$artist->bio}}</p>
		</div>

		<div class="col-md-4">
			<h1>Albums:</h1>
			@foreach($artist->albums as $album)
				<a href="{!!route('albums.show', $album->id)!!}">
					@include('albums.partials.show')
				</a>
			@endforeach
		</div>

		<div class="col-md-4">
			<h1>Tracks:</h1>
			@foreach($artist->tracks as $track)
				<a href="{!!route('tracks.show', $track->id)!!}">
					@include('tracks.partials.show')
				</a>
			@endforeach
		</div>

		<div class="col-md-12">

		</div>
	</article>
@stop
