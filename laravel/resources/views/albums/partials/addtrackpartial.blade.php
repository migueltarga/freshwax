@include('errors.partials.show')

    <p>
        <select name="track_id">
        @foreach($tracks as $t)
            <option value="{{$t->id}}">{{$t->title}}</option>
        @endforeach
        </select>
    </p>
