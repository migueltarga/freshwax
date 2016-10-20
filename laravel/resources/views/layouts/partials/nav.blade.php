<nav class="l-2c">
        <section class="c-1">

            @if($artists->count() > 0)
                {!!link_to_route('artists.index', 'Artists')!!}
            @endif

            @if($albums->count() > 0)
                {!!link_to_route('albums.index', 'Albums')!!}
            @endif

            @if($lyrics->count() > 0)
                {!!link_to_route('lyrics.index', 'Lyrics')!!}
            @endif

            @if($tracks->count() > 0)
                {!!link_to_route('tracks.index', 'Listen')!!}
            @endif

            @if($videos->count() > 0)
                {!!link_to_route('videos.index', 'Videos')!!}
            @endif

            @if($events->count() > 0)
                {!!link_to_route('events.index', 'Events')!!}
            @endif

            @if($posts->count() > 0)
                {!!link_to_route('posts.index', 'News')!!}
            @endif

            @if($items->count() > 0)
                {!!link_to_route('items.index', 'Merch')!!}
            @endif

        </section>

    @if(!Auth::check())

            <section class="c-2">
                {!!link_to_route('users.create', 'Register')!!}
                {!!link_to_action('Auth\AuthController@login', 'Login')!!}
            </section>
    @else
            <section class="c-2">
                @include('layouts.partials.nav.user')
            </section>

            @if(Auth::user()->isartist && !Auth::user()->isadmin)
                <section class="c-1">
                    @include('layouts.partials.nav.artist')
                </section>
            @endif


            @if(Auth::user()->isadmin)
                <section class="c-1">
                    @include('layouts.partials.nav.admin')
                </section>
            @endif
        </div>

    @endif

</nav>

