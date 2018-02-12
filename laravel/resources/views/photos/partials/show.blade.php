<h1>{{$p->name}}</h1>
<p>{{$p->caption}}
	@if(isset($p->banner))
		- banner image
	@endif
</p>

@if(Storage::disk('spaces')->exists($p->path))
	<img src="{{Storage::disk('spaces')->url($p->path)}}" class="img-responsive"/>
@endif

@if(Auth::check() && Auth::user()->isadmin)
	<nav>
		{!!link_to_route('photos.edit', 'Edit', $p->id)!!}
		{!!link_to_route('photos.delete', 'Delete', $p->id)!!}
	</nav>
@endif
