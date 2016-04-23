@extends('layouts.master') 

@section('content') 
	<article class="forms"> 
		<header> 
			<h1>Add Shipping Address</h1>
		</header> 

		{!!Form::open(['route'=>'addresses.store'])!!}
			@include('addresses.partials.form') 

			{!!Form::hidden('done', true)!!}
			{!!Form::hidden('shipping', true)!!}	
			{!!Form::submit('Create')!!}
		{!!Form::close()!!}
	</article> 
@stop 
