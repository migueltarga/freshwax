@extends('layouts.master')

@section('content')
	<article class="forms">
		<header>
			<h1>Are you sure you want to delete {{$album->title}}</h1>
		</header>
        {!!Form::open(["route"=>["albums.destroy", $album->id], "method"=>"DELETE"])!!}
            @include('layouts.form')
			{!!Form::submit("Delete")!!}
		{!!Form::close()!!}
	</article>
@stop
