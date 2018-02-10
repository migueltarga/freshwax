<section class="four columns">

    <header>
        <h1>{{$a->name}}</h1>
    </header>

    @if($a->photos->count())
        @foreach($a->photos as $p)
            <img src="{{$p->path}}" class="img-responsive" />
        @endforeach
    @endif

    @foreach($a->tracks as $track)
        <h2>{{$track->name}}</h2>
    @endforeach

    @foreach($a->artists as $artist)
        <h2>{{$artist->name}}</h2>
    @endforeach

    @include('albums.partials.adminnav')

</section>
