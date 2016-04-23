@extends('layouts.master')

@section('content') 
	<article> 
		<header>
			<h1>Merch</h1>
		</header>

		<?php $count=0 ?>
		@foreach($items as $i)
			@if($count % 3 == 0)
				<div class="row">
			@endif
			@include('items.partials.show')
			@if(++$count % 3 == 0)
				</div>
			@endif
		@endforeach
	</article> 
@stop 
