@include('layouts.partials.form')
@include('errors.partials.show')

<div class="row">
    <div class="col-md-4">
        <label for="title" class="form-label">Title: </label>
        <input type="text" name="title" class="form-control">
    </div>

    <div class="col-md-8">
        <label for="embed" class="form-label">Embed: </label>
        <textarea name="embed" class="form-control"></textarea>
    </div>
</div>
