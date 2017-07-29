        <div class="form-group col-md-4">
            <label class="form-label" for="album_id">
                Album:
            </label>
            <select class="form-control" name="album_id">
                <option value="">NONE</option>
                @foreach($albums as $a)
                    <option value="{{$a->id}}">{{$a->name}}</option>
                 @endforeach
            </select>
        </p>
