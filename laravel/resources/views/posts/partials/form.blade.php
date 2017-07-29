@include('layouts.partials.form')
@include('errors.partials.show')

<div class="container-fluid">
    {!!Form::hidden('user_id', Auth::user()->id)!!}

    <div class="row">
        <div class="form-group col-md-10">
            <label class="form-label" for="name">Name:</label>
            <input class="form-control" type="text" name="name" />
        </div>
        <div class="form-group col-md-2">
            <label class="form-label" for="private">Private:</label>
            <input class="form-control" type="checkbox" name="private" />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label class="form-label" for="body">Share Your Thoughts:</label>
            <textarea class="form-control" name="body"></textarea>
        </div>
    </div>
</div>
