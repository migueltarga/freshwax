@if(Auth::check() && Auth::user()->isadmin)
<nav>
    {!! link_to_route('tracks.edit', 'Edit Track',  $track->id) !!}
    {!! link_to_route('tracks.delete', 'Delete', $track->id) !!}
    {!! link_to_route('lyrics.create', 'Add Lyrics', $track->id) !!}
</nav>
@endif
