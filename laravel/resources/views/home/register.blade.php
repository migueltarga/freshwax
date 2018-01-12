@extends('layouts.master')

@section('content')

	<article>
		<header class="jumbotron">
			<h1>Register</h1>
		</header>
		<div class="col-md-4">
			<a class="btn btn-primary btn-lg text-center" href="{!!route('auth.register.listener')!!}">Listener</a>
		</div>
		<div class="col-md-4">
			<a class="btn btn-primary btn-lg text-center" href="{!!route('auth.register.artist')!!}">Artist</a>
		</div>
		<div class="col-md-4">
			<a class="btn btn-primary btn-lg text-center" href="{!!route('auth.register.label')!!}">Label</a>
		</div>
	</article>
@stop
