@if(Auth::check() && Auth::user())
    <nav>
		<a href="{!!route('labels.edit', $label->id)!!}">
			<i class="fa fa-pencil" aria-hidden="true"></i>
		</a>
		<a href="{!!route('labels.delete', $label->id)!!}">
			<i class="fa fa-trash" aria-hidden="true"></i>
		</a>
    </nav>
@endif
