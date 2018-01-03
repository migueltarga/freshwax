@extends('layouts.master')

@section('content')
    <article>
        <header class="row jumbotron">
			<h1>{{$track->name}}</h1>

			@if(isset($track->album))
				<h2>{{$track->album->name}}</h2>
			@endif
		</header>

		@include('tracks.partials.adminnav')

		<section class="row">
			@foreach($track->photos as $p)
				@if(!$p->banner && !$p->background)
					<img src="{{$p->path}}" class="img-responsive" />
					@break
				@endif
			@endforeach
			<audio controls>
				<source src="{{ $track->path }}">
			</audio>
			{!! $track->soundcloud_embed !!}
		</section>
	</article>
@stop
