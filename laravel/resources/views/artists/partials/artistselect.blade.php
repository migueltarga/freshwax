<div class="form-group col-md-4">
	<label class="form-label" for="artist_id">
		Artist:
	</label>
	<select class="form-control" name="artist_id">
		<option value="">NONE</option>
		@foreach($artists as $a)
			<option value="{{$a->id}}">{{$a->name}}</option>
			@endforeach
	</select>
</div>
