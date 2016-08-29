@extends('layouts.master')

@section('content')
	<article>
		<header>
			<h1>Users</h1>
		</header>

		@foreach($users as $u)
			<?php $count = 0 ?>
				@if($count % 3 == 0)
					<div class="row">
				@endif
				<h1>{{$u->name}}</h1>
				<h2><a href="mailto:{{$u->email}}">{{$u->email}}</a></h2>
				@if(++$count % 3 == 0)
					</div>
				@endif
		@endforeach

	</article>
@stop
