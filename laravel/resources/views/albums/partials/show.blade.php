<section class="four columns"> 

<h1>{{$a->name}}</h1>

@if($a->photos->count())

	@foreach($a->photos as $p)
		<img src="{{$p->path}}" />
	@endforeach

@endif

@foreach($a->artists as $artist)
	<h2>{{$artist->name}}</h2>
@endforeach

@if(Auth::check() && Auth::user()->isadmin)
	<nav class="admin"> 
		{!!link_to_route('photos.album.create', 'Add Photo', $a->id)!!}
		{!!link_to_route('tags.album.create', 'Add Tags', $a->id)!!}
		{!!link_to_route('albums.edit', 'Edit', $a->id)!!}
		{!!link_to_route('albums.delete', 'Delete', $a->id)!!}
	</nav> 
@endif 

</section>
