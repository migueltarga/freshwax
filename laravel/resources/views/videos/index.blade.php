@extends('layouts.master')

@section('content') 
	<article> 
		<header> 
			<h1>Videos</h1>
		</header> 

		<?php $count = 0 ?> 
		@foreach($videos as $v)
			@if($count % 2 == 0)
				<div class="row"> 
			@endif
			@include('videos.partials.display')
			@if(++$count % 2 == 0)
				</div> 
			@endif
		@endforeach
	</article> 
@stop 
