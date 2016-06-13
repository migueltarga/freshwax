@include('layouts.partials.form')
@include('errors.partials.show')

	<p>
		{!!Form::label('tag', 'Tag:')!!}
		{!!Form::text('tag')!!}
	</p>
