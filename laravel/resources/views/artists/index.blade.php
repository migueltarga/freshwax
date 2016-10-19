@extends('layouts.master')

@section('content')
	<article class="twelve columns">
		<header>
			<h1>Artists</h1>
		</header>

		<?php $count=0 ?>
		@foreach($artists as $a)

			@include('artists.partials.show')

		@endforeach

	</article>
@stop
