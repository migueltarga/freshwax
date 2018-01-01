@extends('layouts.master')

@section('content')
	<article>
		<header class="row jumbotron">
            <h1>Tracks</h1>
		</header>

		<?php $count=0 ?>

        @foreach($tracks as $track)

            @if($count % 3 == 0)
				<div class="row">
			@endif
            <div class="col-md-4">
                @include('tracks.partials.show')
            </div>
            @if(++$count % 3 == 0)
				</div>
			@endif
		@endforeach

	</article>
@stop
