@extends('layouts.master')

@section('content')
	<article>
		<header>
			<h1>Artists</h1>
		</header>

		<?php $count=0 ?>
		@foreach($artists as $a)
			@if($count % 3 == 0)
				<div class="row">
			@endif

			@include('artists.partials.show')

			@if(++$count % 3 == 0)
				</div>
			@endif
		@endforeach

	</article>
@stop
