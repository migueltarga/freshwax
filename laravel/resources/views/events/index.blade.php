@extends('layouts.master')

@section('content')
	<article> 
		<header> 
			<h1>Events</h1>
		</header> 		

		<?php $count=0 ?>
		@foreach($events as $e)
			@if($count % 3 == 0)
				<div class="row">
			@endif
			@include('events.partials.show')
			@if(++$count % 3 == 0)
				</div>
			@endif
		@endforeach
	</article> 
@stop
