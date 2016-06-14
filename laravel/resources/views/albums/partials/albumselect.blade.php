        <p>
            <select name="album_id">
                @foreach($albums as $a)
                    <option value="{{$a->id}}">{{$a->name}}</option>
                 @endforeach
            </select>
        </p>
