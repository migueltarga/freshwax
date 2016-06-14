@extends('layouts.master')
@include('errors.partials.show')

@section('content')

<article class="forms">
    <header>
        <h1>Add track to {{$album->name}}</h1>
    </header>
    {!! Form::open(["route"=>"tracks.store"]) !!}
        {!! Form::Hidden('album', $album->id) !!}
    <p>
        <select name="track_id">
        @foreach($tracks as $t)
            <option value="{{$t->id}}">{{$t->title}}</option>
        @endforeach
        </select>
    </p>
        {!! Form::submit('Add Track') !!}
    {!! Form::close() !!}
</article>
@stop
