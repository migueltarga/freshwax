@extends('layouts.master')

@section('content')
	<article> 
		<h1>{{$a->name}}</h1>
				<h2>{{$a->hometown}}</h2>
				<p>{{$a->bio}}</p>

				@foreach($a->photos as $p)
					<img src="{{$p->path}}" />
				@endforeach

				@if(Auth::check())
					@if(Auth::user()->isadmin)
					<nav class="admin"> 
						{!!link_to_route('photos.artist.create', 'Add Photo', $a->id)!!}
						{!!link_to_route('artists.edit', 'Edit', $a->id)!!}
					</nav> 
					@else(Auth::user()->artist->id == $a->id)
					<nav class="admin"> 
						{!!link_to_route('artists.edit', 'Edit Your Profile', $a->id)!!}
						{!!link_to_route('artists.delete', 'Delete', $a->id)!!}
					</nav> 
					@endif
				@endif 
	</article> 
@stop