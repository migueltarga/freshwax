    @if(Auth::check() && Auth::user()->isadmin)
        <nav class="admin">
            {!!link_to_route('albums.track.create', 'Add Track', $album->id)!!}
            {!!link_to_route('photos.album.create', 'Add Photo', $album->id)!!}
            {!!link_to_route('tags.album.create', 'Add Tags', $album->id)!!}
            {!!link_to_route('albums.edit', 'Edit', $album->id)!!}
            {!!link_to_route('albums.delete', 'Delete', $album->id)!!}
        </nav>
    @endif
