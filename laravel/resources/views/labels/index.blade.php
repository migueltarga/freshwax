@extends('layouts.master')

@section('content')

    @if(isset($userLabels))

    @endif

	<article>
		<header class="row jumbotron">
			<h1>Labels</h1>
		</header>

		<?php $count=0 ?>
        @foreach($labels as $label)
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
