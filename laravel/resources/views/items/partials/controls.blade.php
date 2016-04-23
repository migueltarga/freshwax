<div class="row">
	<div class="six columns">
		{!!Form::open(['route'=>'shoppingcarts.additem'])!!}
			{!!Form::hidden('item_id', $i->id)!!}
			{!!Form::submit('Add To Cart')!!}
		{!!Form::close()!!}
	</div>

	@if(Auth::check())
	<div class="six columns">
		{!!Form::open(['route'=>'wishlists.additem'])!!}
			{!!Form::hidden('item_id', $i->id)!!}
			{!!Form::submit('Wishlist')!!}
		{!!Form::close()!!}
	</div>
	@endif
</div>
