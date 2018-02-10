<section>
	<header>
		<h1>{!!link_to_route('tracks.show', $track->name, $track->id)!!}</h1>

		<h2>
			@if($track->lyric != null)
				{!!link_to_route('lyrics.show', 'Lyrics', $track->lyric->id)!!}
			@endif
		</h2>
	</header>

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

	@if($track->tags->count())
		<ul>
			@foreach($track->tags as $tag)
				<li>{{$tag->tag}}</li>
			@endforeach
		</ul>
	@endif

	@include('tracks.partials.adminnav')
</section>
