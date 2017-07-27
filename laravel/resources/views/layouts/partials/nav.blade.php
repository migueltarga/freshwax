<nav class="top l-2c">
        <section class="c-1">

            @if($artists->count() > 0)
                <a class="btn btn-default navbar-btn"
                    href="{!! route('artists.index') !!}">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span> Artists </span>
                </a>
            @endif

            @if($albums->count() > 0)
                <a class="btn btn-default navbar-btn" href="{!! route('albums.index') !!}">
                    <i class="fa fa-music" aria-hidden="true"></i>
                    <span> Albums </span>
                </a>
            @endif

            @if($tracks->count() > 0)
                <a class="btn btn-default navbar-btn" href="{!! route('tracks.index') !!}">
                    <i class="fa fa-headphones" aria-hidden="true"></i>
                    <span> Tracks </span>
                </a>
            @endif

            @if($lyrics->count() > 0)
                {!!link_to_route('lyrics.index', 'Lyrics')!!}
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
            <a class="btn btn-default navbar-btn"
               href="{!! route('users.create') !!}">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                <span>Register</span>
            </a>
            <a class="btn btn-default navbar-btn"
               href="{!! action('Auth\AuthController@login') !!}">
                <i class="fa fa-sign-in" aria-hidden="true"></i>
                <span>Login</span>
            </a>
        </section>
</nav>

@else

    <section class="c-2">
                @include('layouts.partials.nav.user')
    </section>
</nav>
<nav class="left">
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
</nav>
@endif


