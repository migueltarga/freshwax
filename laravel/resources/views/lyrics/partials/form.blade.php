@include('layouts.partials.form')
@include('errors.partials.show')


<select name="track_id">
	@foreach($tracks as $t)
		<option value="{{$t->id}}">{{$t->name}}</option>
	@endforeach
</select>

<p>
	{!!Form::label('lyrics', 'Lyrics:')!!}
	{!!Form::textarea('lyrics')!!}
</p>

<p>
	{!!Form::label('credit', 'Credit:')!!}
	{!!Form::text('credit')!!}
</p>
