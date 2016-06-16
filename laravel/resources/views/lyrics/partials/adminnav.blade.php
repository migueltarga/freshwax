@if(Auth::check() && Auth::user())
    <nav>
        {!! link_to_route('lyrics.edit', 'Edit Lyrics', $lyric->id) !!}
        {!! link_to_route('tracks.edit', 'Edit Track', $lyric->track->id) !!}
        {!! link_to_route('albums.edit', 'Edit Album', $lyric->track->album->id) !!}
        {!! link_to_route('lyrics.delete', 'Delete', $lyric->id) !!}
    </nav>
@endif
