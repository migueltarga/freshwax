@extends('layouts.master')

@section('content')
	<article> 
		<header> 
			<h1>Your Wishlist</h1>
		</header>  
		<table> 
			<tr>
				<th>Name</th> 
				<th>Add To Cart</th> 
			</tr>

		@foreach(Auth::user()->wishlist->items as $i)
			<tr>
				<td>{{$i->name}}</td>
				<td>
					{!!Form::open(['route'=>'shoppingcarts.additem'])!!}
						{!!Form::submit('Add To Cart')!!}
					{!!Form::close()!!}
				</td> 
			</tr>
		@endforeach

			<tr> 
				<td></td>
				<td></td>
			</tr>
		</table> 
	</article> 
@stop
