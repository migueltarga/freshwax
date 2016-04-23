@extends('layouts.master')

@section('content')
<article> 
	<header> 
		<h1>Lyrics</h1>
	</header> 

	<?php $count = 0; ?>
	@foreach($lyrics as $l)
		@if($count % 3 == 0)
			<div class="row"> 
		@endif

		@include('lyrics.partials.display')

		@if(++$count % 3 == 0) 
			</div> 
		@endif 
	@endforeach
</article> 
@stop 
