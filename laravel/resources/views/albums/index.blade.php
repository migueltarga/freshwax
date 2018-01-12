@extends('layouts.master')

@section('content')

    <article>
		<header class="jumbotron">
			<h1>Albums</h1>
		</header>
		<?php $count = 0 ?>
		@foreach($albums as $a)
			@if($count % 3 == 0)
				<div class="row">
			@endif
            <div class="col-md-4">
                @include('albums.partials.show')
            </div>
            @if(++$count % 3 == 0)
				</div>
			@endif
		@endforeach

	</article>
@stop
