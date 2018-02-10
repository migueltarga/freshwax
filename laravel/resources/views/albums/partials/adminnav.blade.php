@if(Auth::check() && Auth::user()->isadmin)
	<nav>
		<a href="{!! route('photos.album.create', $album->id) !!}">
			<i class="fa fa-camera-retro"></i>
		</a>
		<a href="{!! route('albums.edit',  $album->id) !!}">
			<i class="fa fa-pencil"></i>
		</a>
		<a href="{!! route('albums.delete', $album->id) !!}">
			<i class="fa fa-trash"></i>
		</a>
		<a href="{!! route('tags.album.create', $album->id)!!}">
			<i class="fa fa-plus"></i> Tag
		</a>
	</nav>
@endif
