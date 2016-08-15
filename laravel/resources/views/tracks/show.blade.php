@extends('layouts.master')

@section('content')
    <article>
        <header>
            <h1>{{$track->name}}</h1>
            @if(isset($track->album))
                <h2>{{$track->album->name}}</h2>
                @endif
                {{$track->path}}
            {!!$track->soundcloud_embed!!}
        </header>
        @include('tracks.partials.adminnav')
	</article>
@stop
