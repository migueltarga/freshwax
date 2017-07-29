<nav class="row navbar navbar-inverse">
    <div class="container-fluid">
        <ul class="nav navbar-nav navbar-left">
            @if($artists->count() > 0)
            <li
                    @if(Request::is('artists'))
                        class="active"
                    @endif
                >
                <a

                    href="{!! route('artists.index') !!}">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span> Artists </span>
                </a>
            </li>
            @endif

            @if($albums->count() > 0)
            <li
                    @if(Request::is('albums'))
                        class="active"
                    @endif
                >
                <a class="" href="{!! route('albums.index') !!}">
                    <i class="fa fa-music" aria-hidden="true"></i>
                    <span> Albums </span>
                </a>
            </li>
            @endif

            @if($tracks->count() > 0)
            <li
                    @if(Request::is('tracks'))
                        class="active"
                    @endif
                >
                <a class="" href="{!! route('tracks.index') !!}">
                    <i class="fa fa-headphones" aria-hidden="true"></i>
                    <span> Tracks </span>
                </a>
            </li>
            @endif

            @if($lyrics->count() > 0)
            <li
                    @if(Request::is('lyrics'))
                        class="active"
                    @endif
                >
                {!!link_to_route('lyrics.index', 'Lyrics')!!}
            </li>
            @endif

            @if($videos->count() > 0)
            <li
                    @if(Request::is('videos'))
                        class="active"
                    @endif
                >
                {!!link_to_route('videos.index', 'Videos')!!}
            </li>
            @endif

            @if($events->count() > 0)
            <li
                    @if(Request::is('events'))
                        class="active"
                    @endif
                >
                {!!link_to_route('events.index', 'Events')!!}
            </li>
            @endif

            @if($posts->count() > 0)
            <li
                    @if(Request::is('posts'))
                        class="active"
                    @endif
                >
                {!!link_to_route('posts.index', 'News')!!}
            </li>
            @endif

            @if($items->count() > 0)
            <li
                    @if(Request::is('items'))
                        class="active"
                    @endif
                >
                {!!link_to_route('items.index', 'Merch')!!}
            </li>
            @endif
        </ul>

@if(!Auth::check())
        <ul class="nav navbar-nav navbar-right">
            <li
                   @if(Request::is('users/create'))
                        class="active"
                    @endif
                >
            <a class=""
               href="{!! route('users.create') !!}">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                <span>Register</span>
            </a>
            </li>
            <li
                @if(Request::is('login'))
                    class="active"
                @endif
            >
            <a class=""
               href="{!! action('Auth\LoginController@login') !!}">
                <i class="fa fa-sign-in" aria-hidden="true"></i>
                <span>Login</span>
            </a>
            </li>
        </ul>
    </div>
</nav>

@else
        <ul class="nav navbar-nav navbar-right">

                @include('layouts.partials.nav.user')
        </ul>
    </div>
</nav>
<nav class="navbar">
    <div class="container-fluid">
            @if(Auth::user()->isartist && !Auth::user()->isadmin)
                    @include('layouts.partials.nav.artist')
            @endif


            @if(Auth::user()->isadmin)
                    @include('layouts.partials.nav.admin')
            @endif
    </div>
</nav>
@endif


