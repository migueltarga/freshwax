@include('errors.partials.show')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label" for="name">Name:</label>
                <input class="form-control" type="text" name="name" />
            </div>
            @if(Route::currentRouteName() == 'albums.create')
                <div class="form-group">
                    <label class="form-label" for="artist_id">Artist:</label>
                    <select class="form-control" name="artist_id">
                        @foreach($artists as $a)
                            <option value="{{$a->id}}">{{$a->name}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
        <div class="form-group col-md-4">
            <label class="form-label" for="release_date">Release Date:</label>
            <input class="form-control"  type="text" name="release_date" data-field="datetime">
        <div id="dtBox"></div>
        </div>
       <div class="form-group col-md-2">
            <label class="form-label" for="private">Private:</label>
            <input class="form-control" type="checkbox" name="private" />
        </div>
    </div>

   <div class="row">
        <div class="form-group col-md-6">
            <label class="form-label" for="description">Description:</label>
            <textarea class="form-control" name="description"></textarea>
        </div>

        <div class="form-group col-md-6">
            <label class="form-label" for="personnel">Personnel:</label>
            <textarea class="form-control" name="personnel"></textarea>
        </div>
    <div>
</div>
