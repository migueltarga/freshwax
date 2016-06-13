@include('errors.partials.show')

	<p>
		{!!Form::label('name', 'Name:')!!}
		{!!Form::text('name')!!}
	</p> 

	<p> 
		{!!Form::label('hometown', 'Hometown:')!!}
		{!!Form::text('hometown')!!}
	</p> 
	<p> 
		{!!Form::label('bio', 'Bio:')!!}
		{!!Form::textarea('bio')!!}
	</p> 