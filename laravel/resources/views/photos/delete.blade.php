@extends('layouts.master')

@section('content')
	<article> 
		<header> 
			<h1>Delete Photo {{$photo->name}}?</h1>
		</header> 
		{!!Form::open(["route"=>["photos.destroy", $photo->id], "method"=>"DELETE"])!!}
			{!!Form::submit('Delete')!!}
		{!!Form::close()!!}		
	</article> 
@stop
