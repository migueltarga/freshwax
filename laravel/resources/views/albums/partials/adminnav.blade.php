    @if(Auth::check() && Auth::user()->isadmin)
        <nav class="admin">
            {!!link_to_route('albums.track.create', 'Add Track', $a->id)!!}
            {!!link_to_route('photos.album.create', 'Add Photo', $a->id)!!}
            {!!link_to_route('tags.album.create', 'Add Tags', $a->id)!!}
            {!!link_to_route('albums.edit', 'Edit', $a->id)!!}
            {!!link_to_route('albums.delete', 'Delete', $a->id)!!}
        </nav>
    @endif
