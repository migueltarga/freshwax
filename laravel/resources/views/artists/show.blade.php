@extends('layouts.master')

@section('content')
	<article class="row">

		<header class="jumbotron col-md-12">
			<h1>{{$a->name}}</h1>
			<h2>{{$a->hometown}}</h2>
		</header>

		@include('artists.partials.adminnav')

		<div class="col-md-4">
			<h3>Bio:</h3>
			<p>{{$a->bio}}</p>
		</div>

		<div class="col-md-4">
			<h3>Albums:</h3>
			<ul>
			@foreach($a->albums as $album)
				<li>
					<a href="{!!route('albums.show', $album->id)!!}">
						{!! $a->name !!}
					</a>
				</li>
				@endforeach
			</ul>
		</div>

		<div class="col-md-4">
			<h3>Tracks:</h3>
			<ul>
				@foreach($a->tracks as $t)
					<li>
						<a href="{!!route('tracks.show', $t->id)!!}">
							{!! $t->name !!}
						</a>
					</li>
				@endforeach
			</ul>
		</div>

		<div class="col-md-12">
			@foreach($a->photos as $p)
				<img src="{{$p->path}}" />
			@endforeach
		</div>
	</article>
@stop
