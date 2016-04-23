<h1>{{$p->name}}</h1>
<p>{{$p->caption}} 
	@if(isset($p->banner))
		- banner image
	@endif
</p>
<img src="{{$p->path}}" /> 
@if(Auth::check() && Auth::user()->isadmin)
	<nav> 
		{!!link_to_route('photos.edit', 'Edit', $p->id)!!}
		{!!link_to_route('photos.delete', 'Delete', $p->id)!!}
	</nav> 
@endif
