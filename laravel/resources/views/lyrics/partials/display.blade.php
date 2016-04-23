<section class="four columns"> 
	<h1>{!!link_to_route('lyrics.show', $l->track->name, $l->id)!!}</h1>
	@if(Auth::check() && Auth::user()->isadmin) 
		<nav class="admin_options"> 
			{!!link_to_route('lyrics.edit', 'Edit', $l->id)!!}
			{!!link_to_route('lyrics.delete', 'Delete', $l->id)!!}
		</nav> 
	@endif 
</section> 
