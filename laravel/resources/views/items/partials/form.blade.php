@include('errors.partials.show')

	<p>
		{!!Form::label('name', 'Name:')!!}
		{!!Form::text('name')!!}
	</p> 

	<p> 
		{!!Form::label('description', 'Description:')!!}
		{!!Form::textarea('description')!!}
	</p> 

	<p>
		{!!Form::label('total', 'Total:')!!}
		{!!Form::text('total')!!}
	</p> 

