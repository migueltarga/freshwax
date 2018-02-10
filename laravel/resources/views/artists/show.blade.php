@extends('layouts.master')

@section('content')
	<article class="row">

		<header class="jumbotron col-md-12">
			<div class="col-md-3">
			@foreach($a->photos as $p)
				<img src="{{$p->path}}" class="img-responsive img-circle" />
				@break;
			@endforeach
			</div>

			<div class="col-md-9">
				<h1>{{$a->name}}</h1>
				<h2>{{$a->hometown}}</h2>
			</div>
		</header>

		@include('artists.partials.adminnav')

		<div class="col-md-4">
			<h1>Bio:</h1>
			<p>{{$a->bio}}</p>
		</div>

		<div class="col-md-4">
			<h1>Albums:</h1>
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
			<h1>Tracks:</h1>
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

		</div>
	</article>
@stop
