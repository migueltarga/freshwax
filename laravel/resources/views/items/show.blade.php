@extends('layouts.master')

@section('content') 
	<article class="forms"> 
		<header> 
		<h1>{{$i->name}} - ${{$i->total}}</h1>
		
		<h2>{{$i->description}} </h2>
		</header>
		@if($i->photos->count())
			@foreach($i->photos as $p)
				<img src="{{$p->path}}" /> 
			@endforeach
		@endif

		<h4>
			@if($i->tags->count())
				@foreach($i->tags as $t)
					{{$t->tag}}
				@endforeach
			@endif
		</h4>
		
		<div class="row"> 
			<div class="six columns"> 
				{!!Form::open(['route'=>'shoppingcarts.additem'])!!}
					{!!Form::hidden('item_id', $i->id)!!}
					{!!Form::submit('Add To Cart')!!}
				{!!Form::close()!!}
			</div> 
			
			<div class="six columns"> 
				{!!Form::open(['route'=>'wishlists.additem'])!!}
					{!!Form::hidden('item_id', $i->id)!!}
					{!!Form::submit('Wishlist')!!}
				{!!Form::close()!!}
			</div> 
		</div> 
				
		@if(Auth::check() && Auth::user()->isadmin)
			<nav class="admin"> 
				{!!link_to_route('photos.item.create', 'Add Photo', $i->id)!!}
				{!!link_to_route('tags.item.create', 'Add Tags', $i->id)!!}
				{!!link_to_route('items.edit', 'Edit', $i->id)!!}
			</nav> 
		@endif 
	</article> 
@stop 
