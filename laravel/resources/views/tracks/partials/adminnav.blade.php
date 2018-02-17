@can('update', $track)
	<nav>
		<a href="{!! route('photos.track.create', $track->id) !!}">
			<i class="fa fa-camera-retro"></i>
		</a>
		<a href="{!! route('tracks.edit',  $track->id) !!}">
			<i class="fa fa-pencil"></i>
		</a>
		<a href="{!! route('tracks.delete', $track->id) !!}">
			<i class="fa fa-trash"></i>
		</a>
		<a href="{!! route('lyrics.create', $track->id) !!}">
			<i class="fa fa-plus"></i> Lyrics
		</a>
		<a href="{!! route('tags.track.create', $track->id)!!}">
			<i class="fa fa-plus"></i> Tag
		</a>
	</nav>
@endcan
