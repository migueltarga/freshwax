<div class="form-group col-md-4">
	<label class="form-label" for="album_id">
		Artist:
	</label>
	<select class="form-control" name="album_id">
		<option value="">NONE</option>
		@foreach($artists as $a)
			<option value="{{$a->id}}">{{$a->name}}</option>
			@endforeach
	</select>
</div>
