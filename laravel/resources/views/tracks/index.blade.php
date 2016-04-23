@extends('layouts.master')

@section('content')
	<article> 
		<header> 
			<h1>Tracks</h1>
		</header> 
		
		<?php $count=0 ?>
		@foreach($tracks as $t) 
			@if($count % 3 == 0)
				<div class="row">
			@endif
			@include('tracks.partials.show')
			@if(++$count % 3 == 0)
				<div class="row">
			@endif
		@endforeach

	</article> 
@stop
