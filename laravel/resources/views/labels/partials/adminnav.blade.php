@can('update', $label)
	<nav>
		<a href="{!!route('photos.label.create',$label->id)!!}">
			<i class="fa fa-camera-retro" aria-hidden="true"></i>
		</a>
		<a href="{!!route('labels.edit', $label->id)!!}">
			<i class="fa fa-pencil" aria-hidden="true"></i>
		</a>
		<a href="{!!route('labels.delete', $label->id)!!}">
			<i class="fa fa-trash" aria-hidden="true"></i>
		</a>
	</nav>
@endcan
