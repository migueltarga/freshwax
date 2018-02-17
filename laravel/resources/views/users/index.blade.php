@extends('layouts.master')

@section('content')
	<article class="container-fluid">
		<header class="jumbotron">
			<h1>Users</h1>
		</header>

		<?php $count = 0 ?>
		@foreach($users as $user)
				@if($count % 4 == 0)
					<div class="row">
                @endif

						<div class="col-md-3">
							@include('users.partials.show')
						</div>

				@if(++$count % 4 == 0)
					</div>
				@endif
		@endforeach

	</article>
@stop
