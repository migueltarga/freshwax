@include('layouts.partials.form')
@include('errors.partials.show')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label class="form-label" for="name">Name:</label>
                <input class="form-control" type="text" name="name" />
            </div>
        </div>
       <div class="form-group col-md-2">
            <label class="form-label" for="track">File:</label>
            <input class="form-control" type="file" name="track" />
        </div>
        <div class="form-group col-md-2">
            <label class="form-label" for="private">Private:</label>
            <input class="form-control" type="checkbox" name="private" />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-8">
            <label class="form-label" for="comments">Say Something About This Track:</label>
            <textarea class="form-control" name="comments"></textarea>
        </div>
        <div class="form-group col-md-4">
            <label class="form-label" for="embed">Embed:</label>
            <textarea class="form-control" name="embed"></textarea>
        </div>
    </div>
    <div class="row">
        @include('albums.partials.albumselect')
        @include('artists.partials.artistselect')
    </div>
</div>

