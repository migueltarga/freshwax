@extends('layouts.master')

@section('content')
	<article> 
		<h1>Lounge</h1>

		<?php $count = 0 ?>
		@foreach($events as $e)
			@if($count % 3 == 0)
				<div class="row">
			@endif
			@include('events.partials.show')
			@if(++$count % 3 == 0)
				</div>
			@endif
		@endforeach

		@foreach($tracks as $t)
			@if($count % 3 == 0)
				<div class="row">
			@endif
			@include('tracks.partials.show')
			@if(++$count % 3 == 0)
				</div>
			@endif
		@endforeach
		
		@foreach($posts as $p)
			@if($count % 3 == 0)
				<div class="row">
			@endif
			@include('posts.partials.show')
			@if(++$count % 3 == 0)
				</div>
			@endif
		@endforeach
	</article> 
@stop