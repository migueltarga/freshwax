        <p>
            <label for="album_id">
                Album:
            </label>
            <select name="album_id">
                <option value="">NONE</option>
                @foreach($albums as $a)
                    <option value="{{$a->id}}">{{$a->name}}</option>
                 @endforeach
            </select>
        </p>
