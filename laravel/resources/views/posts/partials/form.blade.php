@include('layouts.partials.form')
@include('errors.partials.show')

	<p>
		{!!Form::label('name', 'Name:')!!}
		{!!Form::text('name')!!}
	</p>
	<p>
		{!!Form::label('body', 'Post:')!!}
		{!!Form::textarea('body')!!}
	</p>

	{!!Form::hidden('user_id', Auth::user()->id)!!}

	<p>
		{!!Form::label('private', 'Private:')!!}
		{!!Form::checkbox('private')!!}
	</p>
