<section>


    @if($album->photos->count())
        @foreach($album->photos as $p)
			@if(!$p->banner && !$p->background && Storage::disk('spaces')->exists($p->path))
				<img src="{{Storage::disk('spaces')->url($p->path)}}" class="img-responsive" />
			@endif
		@endforeach
	@else

		<header>
			<h1>{{$album->name}}</h1>

			@foreach($album->artists as $artist)
				<h3>{{$artist->name}}</h3>
			@endforeach
		</header>
    @endif

    @foreach($album->tracks as $track)
        <h2>{{$track->name}}</h2>
    @endforeach



    @include('albums.partials.adminnav')

</section>
