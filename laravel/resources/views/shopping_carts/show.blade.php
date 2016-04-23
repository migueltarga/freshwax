@extends('layouts.master')

@section('content')
	<article> 
		<header> 
			<h1>Your Cart</h1> 
		</header>

		<table> 
			<tr>
				<th>Name</th> 
				<th>Total</th> 
				<th>Remove</th>
			</tr>

		@foreach($cart->items as $i)
			<tr>
				<td>{{$i->name}}</td>
				<td>{{$i->total}}</td> 
				<td>
					{!!Form::open(['route'=>'shoppingcarts.removeitem'])!!}
						{!!Form::hidden('item_id', $i->id)!!}
						{!!Form::submit('Remove')!!}
					{!!Form::close()!!}
				</td>
			</tr>
		@endforeach

			<tr> 
				<td>Total:</td>
				<td>{{$cart->total()}}</td>
				<td>
					{!!Form::open(['route'=>'orders.store'])!!}
						{!!Form::hidden('shopping_cart_id', $cart->id)!!}
						{!!Form::submit('Order')!!}
					{!!Form::close()!!}
				</td> 
			</tr>
		</table> 
	</article> 
@stop
