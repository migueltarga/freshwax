<nav class="twelve columns row">
    <section class="six columns">

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

        <section class="six columns">
            {!!link_to_route('users.create', 'Register')!!}
            {!!link_to_action('Auth\AuthController@login', 'Login')!!}
        </section>

    @else
        <div class="row">
            @if(Auth::user()->isadmin)
                <section class="three columns">
                    @include('layouts.partials.nav.admin')
                </section>
            @endif

            @if(Auth::user()->isartist && !Auth::user()->isadmin)
                <section class="artist_nav">
                    @include('layouts.partials.nav.artist')
                </section>
            @endif

            <section class="user_nav">
                @include('layouts.partials.nav.user')
            </section>
        </div>

    @endif

</nav>

