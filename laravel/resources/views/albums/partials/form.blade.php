@include('layouts.partials.form')
@include('errors.partials.show')

	<p>
		{!!Form::label('name', 'Name:')!!}
		{!!Form::text('name')!!}
	</p>

	<p>
	 {!!Form::label('release_date', 'Release Date:')!!}
	 <input type="text" name="release_date" data-field="datetime">
 	 <div id="dtBox"></div>
	</p>


	<p>
		{!!Form::label('description', 'Description (Optional):')!!}
		{!!Form::textarea('description')!!}
	</p>

	<p>
		{!!Form::label('personnel', 'Personnel (Optional):')!!}
		{!!Form::textarea('personnel')!!}
	</p>

	<p>
		{!!Form::label('Private', 'Private:')!!}
		{!!Form::checkbox('Private')!!}
	</p>

	@if(Route::currentRouteName() == 'artists.create')
	<p>
		<select name="artist_id">
		@foreach($artists as $a)
			<option value="{{$a->id}}">{{$a->name}}</option>
		@endforeach
		</select>
	</p>
	@endif
