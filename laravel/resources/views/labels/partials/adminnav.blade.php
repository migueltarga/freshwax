@if(Auth::check() && Auth::user())
    <nav>
        @if(!$a->active_profile)
			<a href="{!!route('artists.makeactive', $a->id)!!}">
				<i class="fa fa-star-o" aria-hidden="true"></i>
			</a>
        @endif
		<a href="{!!route('photos.artist.create',$a->id)!!}">
			<i class="fa fa-camera-retro" aria-hidden="true"></i>
		</a>
		<a href="{!!route('artists.edit', $a->id)!!}">
			<i class="fa fa-pencil" aria-hidden="true"></i>
		</a>
		<a href="{!!route('artists.edit', $a->id)!!}">
			<i class="fa fa-trash" aria-hidden="true"></i>
		</a>
    </nav>
@endif
