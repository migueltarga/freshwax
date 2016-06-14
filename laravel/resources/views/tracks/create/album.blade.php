@extends('layouts.master')
@include('errors.partials.show')

@section('content')

<article class="forms">
    <header>
        <h1>Add track to {{$album->name}}</h1>
    </header>
    {!!Form::model($album, array('route' => array('albums.update', $album->id), 'method' => 'PUT'))!!}
    {!! Form::open(["route"=>"tracks.store"]) !!}
        {!! Form::Hidden('album', $album->id) !!}
        @if(count($tracks)>0)
            @include('tracks.partials.trackselect')
            <h2>OR</h2>
        @endif
        {!! link_to_route("tracks.create", "Create a Track") !!}
        {!! Form::submit('Add Track') !!}
    {!! Form::close() !!}
</article>
@stop
