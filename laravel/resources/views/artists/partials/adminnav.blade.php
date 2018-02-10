@if(Auth::check() && Auth::user())
    <nav class="navbar col-md-12">
        @if(!$artist->active_profile)
			<a href="{!!route('artists.makeactive', $artist->id)!!}">
				<i class="fa fa-star-o" aria-hidden="true"></i>
			</a>
        @endif
		<a href="{!!route('photos.artist.create',$artist->id)!!}">
			<i class="fa fa-camera-retro" aria-hidden="true"></i>
		</a>
		<a href="{!!route('artists.edit', $artist->id)!!}">
			<i class="fa fa-pencil" aria-hidden="true"></i>
		</a>
		<a href="{!!route('artists.edit', $artist->id)!!}">
			<i class="fa fa-trash" aria-hidden="true"></i>
		</a>
    </nav>
@endif
