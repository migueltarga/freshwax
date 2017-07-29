@extends('layouts.master')

@section('content')
	<article class="container-fluid">
		<header class="jumbotron">
			<h1>Photos</h1>
		</header>

		<?php $count = 0 ?>
		@foreach($photos as $p)
			@if($count % 3 == 0)
				<div class="row">
			@endif
                    <section class="col-md-4">
                        @include('photos.partials.show')
                    </section>
			@if(++$count % 3 == 0)
				</div>
			@endif
		@endforeach
	</article>
@stop
