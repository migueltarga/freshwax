<section>


	@if($track->photos->count())

		@foreach($track->photos as $p)
			@if(!$p->banner && !$p->background && Storage::disk('spaces')->exists($p->path))
				<img src="{{ Storage::disk('spaces')->url($p->path) }}" class="img-responsive" />
				@break
			@endif
		@endforeach

	@else

		<header>
			<h1>{{$track->name}}</h1>

			<h2>
				@if($track->lyric != null)
					{!!link_to_route('lyrics.show', 'Lyrics', $track->lyric->id)!!}
				@endif
			</h2>
		</header>

	@endif

	@if(Storage::disk('spaces')->exists($track->path))
		<audio controls>
			<source src="{{ Storage::disk('spaces')->temporaryUrl($track->path, now()->addMinutes(30)) }}">
		</audio>
	@endif

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
