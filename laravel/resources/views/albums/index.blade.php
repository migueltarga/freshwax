@extends('layouts.master')

@section('content')
	<article class="twelve columns">
		<header>
			<h1>Discography</h1>
		</header>
		<?php $count = 0 ?>
		@foreach($albums as $a)
			@if($count % 3 == 0)
				<div class="row">
			@endif

            @include('albums.partials.show')

            @if(++$count % 3 == 0)
				</div>
			@endif
		@endforeach

	</article>
@stop
