@include('layouts.partials.form')
@include('errors.partials.show')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
				<label class="form-label" for="name">Name:</label>
                <input class="form-control" type="text" name="name" value="{!! isset($label) ? $label->name : '' !!}" />
			</div>

            <div class="form-group">
				<label class="form-label" for="city">City:</label>
                <input class="form-control" type="text" name="city" value="{!! isset($label) ? $label->city : '' !!}"/>
			</div>
		</div>
		<div class="col-md-8">
            <div class="form-group">
				<label class="form-label" for="about">About:</label>
				<textarea class="form-control" name="about" >{!! isset($label) ? $label->about : '' !!}</textarea>
			</div>
		</div>
	</div>
</div>
