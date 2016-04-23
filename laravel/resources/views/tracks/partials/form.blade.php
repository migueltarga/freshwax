@include('errors.partials.show')

	<p>
		{!!Form::label('name', 'Name:')!!}
		{!!Form::text('name')!!}
	</p> 

	<p>
		{!!Form::label('track', 'Track:')!!}
		{!!Form::file('track')!!}
	</p>
	
	<p>
		{!!Form::label('soundcloud_embed', 'Soundcloud Embed:')!!}
		{!!Form::textarea('soundcloud_embed')!!}
	</p> 

	<p>
		{!!Form::label('comment', 'Lounge Comments:')!!}
		{!!Form::text('comment')!!}
	</p> 

	<p> 
		{!!Form::label('private', 'Private:')!!}
		{!!Form::checkbox('private')!!}
	</p> 

