@if(Auth::check() && Auth::user()->isadmin)
<nav>
    {!! link_to_route('lyrics.create', 'Add Lyrics', $track->id) !!}
    {!!link_to_route('photos.track.create', 'Add Photo', $track->id)!!}
    {!!link_to_route('tags.track.create', 'Add Tags', $track->id)!!}
    {!! link_to_route('tracks.edit', 'Edit Track',  $track->id) !!}
    {!! link_to_route('tracks.delete', 'Delete', $track->id) !!}
</nav>
@endif
