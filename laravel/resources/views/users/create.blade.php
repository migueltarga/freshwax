@extends('layouts.master')

@section('content')
	<article class="fluid-container">
		<header class="jumbotron">
		@if($users->count() == 0)
			<h1>Welcome To Your New Site Please Create an Admin Account</h1>
		@else
			<h1>Register</h1>
		@endif
		</header>

		{!!Form::open(['route'=>'users.store'])!!}
			@include('users.partials.form')
			{!!Form::submit('register')!!}
		{!!Form::close()!!}
	</article>
@stop
