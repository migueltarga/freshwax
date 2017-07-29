@include('errors.partials.show')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-md-6">
            <label class="form-label" for="name">Name:</label>
            <input class="form-control" type="text" name="name" />
        </div>

        <div class="form-group col-md-6">
            <label class="form-label" for="description">Description:</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
    </div>

	<div class="row">
        <div class="form-group col-md-6">
            <label class="form-label" for="total">Price:</label>
            <input class="form-control" type="total" name="name" />
        </div>
    </div>
</div>
