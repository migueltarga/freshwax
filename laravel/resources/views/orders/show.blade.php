@extends('layouts.master')

@section('content')
	<article> 
		<h1>{{$order->id}}</h1>
		<ul>
		@foreach($order->items as $i)
			<li>{{$i->name}}</li>
		@endforeach
		</ul> 
		<h2>Total {{$order->total}}</h2>
	</article> 
@stop