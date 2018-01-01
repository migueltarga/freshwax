@include('errors.partials.show')

<div class="row">
	<div class="form-group col-md-6">
		<label class="form-label" for="name">Name:</label>
		<input class="form-control" type="text" name="name" />
	</div>


	<div class="form-group col-md-4">
		<label class="form-label" for="time">Time:</label>
		<input type="datetime" class="form-control" name="time" data-field="datetime" placeholder="Click To Select A Time" readonly>
		<div id="dtBox"></div>
	</div>
	<div class="form-group col-md-2">
		<label class="form-label" for="private">Private:</label>
		<input class="form-control" type="checkbox" name="private" />
	</div>
</div>

<div class="row">
	<div class="form-group col-md-4">
			<label class="form-label" for="location">Location:</label>
			<input class="form-control" type="text" name="location" />
	</div>

	<div class="form-group col-md-8">
		<label class="form-label" for="description">Description:</label>
		<textarea class="form-control" name="description"></textarea>
	</div>
</div>
