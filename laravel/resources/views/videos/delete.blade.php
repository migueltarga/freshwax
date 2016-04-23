@extends("layouts.master") 

@section("content") 
	<article class="forms"> 
		<h1>Are you sure you want to delete {{$video->title}}?</h1>
		{!!Form::open(["route"=>["videos.destroy", $video->id], "method"=>"DELETE"])!!}
			{!!Form::submit("Delete")!!}
		{!!Form::close()!!}
	</article> 
@stop 
