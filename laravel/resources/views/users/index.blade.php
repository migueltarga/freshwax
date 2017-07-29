@extends('layouts.master')

@section('content')
	<article class="container-fluid">
		<header class="jumbotron">
			<h1>Users</h1>
		</header>

		@foreach($users as $u)
			<?php $count = 0 ?>
				@if($count % 4 == 0)
					<div class="row">
                @endif
                        <div class="col-md-3">
                            <h1>{{$u->name}}</h1>
                            <h2><a href="mailto:{{$u->email}}">{{$u->email}}</a></h2>
                        </div>
				@if(++$count % 4 == 0)
					</div>
				@endif
		@endforeach

	</article>
@stop
