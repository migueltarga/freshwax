@extends('layouts.master')

@section('content') 
	<article> 
		<h1>Are You Sure You Want To Delete {!!$post->name!!}?</h1>
		{!!Form::open(["route"=>["posts.destroy", $post->id], "method"=>"DELETE"])!!}
			{!!Form::submit("Delete")!!}
		{!!Form::close()!!}
	</article> 
@stop 
