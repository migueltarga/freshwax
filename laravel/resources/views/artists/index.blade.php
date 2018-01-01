@extends('layouts.master')

@section('content')

    @if(isset($userArtists))
        <article>
            <header class="row jumbotron">
                <h1>Your Artists</h1>
            </header>


            <?php $count=0 ?>
            @foreach($userArtists as $a)
                @if($count % 3 == 0)
                    <div class="row">
                @endif
                <div class="col-md-4">
                    @include('artists.partials.show')
                </div>
                @if(++$count % 3 == 0)
                    </div>
                @endif
            @endforeach
        </article>
    @endif

	<article>
		<header class="row jumbotron">
			<h1>Artists</h1>
		</header>

		<?php $count=0 ?>
        @foreach($artists as $a)
            @if($count % 3 == 0)
                <div class="row">
            @endif
            <div class="col-md-4">
			    @include('artists.partials.show')
            </div>
            @if(++$count % 3 == 0)
                </div>
            @endif
		@endforeach

	</article>
@stop
