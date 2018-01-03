@include('layouts.partials.form')
@include('errors.partials.show')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-label" for="name">Name:</label>
                <input class="form-control" type="text" name="name" />
			</div>
		</div>
		<div class="col-md-8">
			<div class="form-group">
				<label class="form-label" for="caption">Caption:</label>
				<textarea class="form-control" name="caption"></textarea>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			<div class="form-group">
				<label class="form-label" for="banner">Banner:</label>
				<input class="form-control" type="checkbox" name="banner" />
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<label class="form-label" for="background">Background:</label>
				<input class="form-control" type="checkbox" name="background" />
			</div>
		</div>
		<div class="col-md-8">
			<div class="form-group">
				<label class="form-label" for="photo">Photo:</label>
				{!!Form::file('photo')!!}
			</div>
		</div>
	</div>
</div>
