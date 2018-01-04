@if(Auth::check() && Auth::user())
    <nav>
		<a href="{!!route('photos.label.create',$l->id)!!}">
			<i class="fa fa-camera-retro" aria-hidden="true"></i>
		</a>
		<a href="{!!route('labels.edit', $l->id)!!}">
			<i class="fa fa-pencil" aria-hidden="true"></i>
		</a>
		<a href="{!!route('labels.delete', $l->id)!!}">
			<i class="fa fa-trash" aria-hidden="true"></i>
		</a>
    </nav>
@endif
