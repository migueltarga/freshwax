@extends('layouts.master')

@section('content')
	<article class="forms">
		<header>
			<h1>Add Address</h1>
		</header>

		{!!Form::open(['route'=>'addresses.store'])!!}

			@include('addresses.partials.form')

			<div class="row">
                		<div class="six columns">
                        		{!!Form::label('billing', 'Billing:')!!}
                        		{!!Form::checkbox('billing')!!}
                		</div>

                		<div class="six columns">
                        		{!!Form::label('shipping', 'Shipping:')!!}
                        		{!!Form::checkbox('shipping')!!}
                		</div>
        		</div>

			{!!Form::submit('Create')!!}

		{!!Form::close()!!}
	</article>
@stop
