@if(Auth::check() && Auth::user())
    <nav>
        @if(!$a->active_profile)
             {!!link_to_route('artists.makeactive', 'Activate', $a->id)!!}
        @else
             <p class="center">Active Profile</p>
        @endif
        {!!link_to_route('photos.artist.create', 'Add Photo', $a->id)!!}
        {!!link_to_route('artists.edit', 'Edit', $a->id)!!}
        {!!link_to_route('artists.delete', 'Delete', $a->id)!!}
    </nav>
@endif
