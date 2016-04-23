@extends('layouts.master')

@section('content') 
	<article class="forms">
		<header>  
			<h1>Create Item</h1>
		</header> 
		{!!Form::open(['route'=>'items.store'])!!}
			@include('items.partials.form')
			{!!Form::submit('create')!!}
		{!!Form::close()!!}

	</article> 
@stop 
