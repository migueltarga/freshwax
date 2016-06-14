        <p>
            <select name="track_id">
                @foreach($tracks as $t)
                    <option value="{{$t->id}}">{{$t->name}}</option>
                 @endforeach
            </select>
        </p>
