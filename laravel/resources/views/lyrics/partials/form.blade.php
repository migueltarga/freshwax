@include('layouts.partials.form')
@include('errors.partials.show')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-md-6">
        <label for="track_id" class="form-label">Track:</label>
        <select name="track_id" class="form-control">
            <option value="">--Please Select A Track</option>
            @foreach($tracks as $t)
                <option value="{{$t->id}}">{{$t->name}}</option>
            @endforeach
        </select>
        </div>
        <div class="form-group col-md-6">
            <label class="form-label" for="credit">Credits:</label>
            <textarea class="form-control" name="credit"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label class="form-label" for="lyrics">Lyrics:</label>
            <textarea class="form-control" name="lyrics"></textarea>
        </div>
    </div>
</div>
