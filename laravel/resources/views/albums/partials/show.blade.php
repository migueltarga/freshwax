<section>

    <header>
        <h1>{{$album->name}}</h1>
    </header>

    @if($album->photos->count())
        @foreach($album->photos as $p)
            <img src="{{$p->path}}" class="img-responsive" />
        @endforeach
    @endif

    @foreach($album->tracks as $track)
        <h2>{{$track->name}}</h2>
    @endforeach

    @foreach($album->artists as $artist)
        <h2>{{$artist->name}}</h2>
    @endforeach

    @include('albums.partials.adminnav')

</section>
