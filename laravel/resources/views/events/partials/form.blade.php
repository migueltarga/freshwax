@include('errors.partials.show')

	<p>
		{!!Form::label('name', 'Name:')!!}
		{!!Form::text('name')!!}
	</p> 

	 
	<p>
	 {!!Form::label('time', 'Time')!!}
	 <input type="datetime" name="time" data-field="datetime" readonly>
 	 <div id="dtBox"></div>
	</p>

	<p> 
		{!!Form::label('location', 'Location:')!!}
		{!!Form::text('location')!!}
	</p> 

	<p> 
		{!!Form::label('description', 'Description (Optional):')!!}
		{!!Form::textarea('description')!!}
	</p> 

	<p> 
		{!!Form::label('private', 'Private:')!!}
		{!!Form::checkbox('private')!!}
	</p> 

