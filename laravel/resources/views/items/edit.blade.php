@extends('layouts.master')

@section('content')
	<article> 
		<h1>Edit Item</h1>
		{!!Form::model($item, array('route' => array('items.update', $item->id), 'method' => 'PUT'))!!}
			@include('items.partials.form')
			{!!Form::submit('Edit')!!}
		{!!Form::close()!!}
	</article> 
@stop