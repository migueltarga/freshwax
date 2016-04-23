<section class="six columns"> 
	<h1>{!!$v->title!!}</h1>
	{!!$v->embed!!}

	@if(Auth::check() && Auth::user()->isadmin)
		<nav class="admin_option"> 
		{!!link_to_route('videos.edit', 'edit', $v->id)!!}
		{!!link_to_route('videos.delete', 'delete', $v->id)!!}
		</nav> 
	@endif 
</section> 
