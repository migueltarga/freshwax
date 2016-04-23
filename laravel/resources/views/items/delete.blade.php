@extends('layouts.master')

@section('content') 
	<article class="forms">
		<header>  
			<h1>Are You Sure You Want To Delete {!!$item->name!!}?</h1>
		</header>
		{!!Form::open(['route'=>["items.destroy", $item->id], 'method'=>'DELETE'])!!}
			{!!Form::submit('destroy')!!}
		{!!Form::close()!!}
	</article> 
@stop 
