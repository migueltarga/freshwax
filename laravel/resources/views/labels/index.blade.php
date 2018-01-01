@extends('layouts.master')

@section('content')

    @if(isset($userLabels))

    @endif

	<article class="col-md-12">
		<header class="jumbotron">
			<h1>Labels</h1>
		</header>

		<?php $count=0 ?>
        @foreach($labels as $l)
            @if($count % 3 == 0)
                <div class="row">
            @endif
            <div class="col-md-4">
			    @include('labels.partials.show')
            </div>
            @if(++$count % 3 == 0)
                </div>
            @endif
		@endforeach

	</article>
@stop
