@include('layouts.partials.form')
@include('errors.partials.show')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
				<label class="form-label" for="name">Name:</label>
                <input class="form-control" type="text" name="name" />
			</div>

            <div class="form-group">
				<label class="form-label" for="hometown">Hometown:</label>
                <input class="form-control" type="text" name="hometown" />
			</div>
		</div>
		<div class="col-md-8">
            <div class="form-group">
				<label class="form-label" for="bio">Bio:</label>
				<textarea class="form-control" name="bio"></textarea>
			</div>
		</div>
	</div>
</div>
