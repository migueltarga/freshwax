<section class="third">
                <a href="{{route('artists.show', $artist->id)}}">
                    <h1>{{$artist->name}}</h1>
                    <h2>{{$artist->hometown}}</h2>
                    <p>{{$artist->bio}}</p>

                    @foreach($artist->photos as $p)
                        @if(!$p->banner && !$p->background && Storage::disk('spaces')->exists($p->path))
                            <img src="{{Storage::disk('spaces')->url($p->path)}}" class="img-circle img-responsive" />
                        @endif
                    @endforeach

                    @if($artist->hasBanner())
                        <h3>Banner</h3>
                        <img src="{{$artist->banner()->path}}">
                    @endif

                    @if($artist->hasBackground())
                        <h3>Background</h3>
                        <img src="{{$artist->background()->path}}">
                    @endif
                </a>
                @if(Auth::check() && isset($artist->user) && Auth::user()->id == $artist->user->id)
                    @include('artists.partials.adminnav')
                @endif
</section>
