@extends('layouts.master')

@section('content')
	<article> 
		<header> 
			<h1>Posts</h1>
		</header> 
		
		<?php $count=0 ?>
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