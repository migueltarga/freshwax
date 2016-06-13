@include('layouts.partials.form')
@include('errors.partials.show')

<p>
	{!!Form::label('title', 'Title:')!!}
	{!!Form::text('title')!!}
</p>

<p>
	{!!Form::label('embed', 'Embed:')!!}
	{!!Form::textarea('embed')!!}
</p>
