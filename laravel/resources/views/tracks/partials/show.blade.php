<section class="four columns"> 
	<header> 
		<h1>{{$t->name}}</h1>
		
		<h4> 
			@if($t->lyric != null)
				{!!link_to_route('lyrics.show', 'Lyrics', $t->lyric->id)!!}
			@endif
		</h4> 	

	</header>
	
	@if(isset($t->soundcloud_embed))
		{!!$t->soundcloud_embed!!}
	@endif

	<h4>
		@if($t->tags->count())
			@foreach($t->tags as $tag)
				{{$tag->tag}}
			@endforeach
		@endif
	</h4>


	@if(Auth::check() && Auth::user()->isadmin)
		<nav class="admin"> 
			{!!link_to_route('photos.track.create', 'Add Photo', $t->id)!!}
			{!!link_to_route('tags.track.create', 'Add Tags', $t->id)!!}
			{!!link_to_route('tracks.edit', 'Edit', $t->id)!!}
			{!!link_to_route('tracks.delete', 'Delete', $t->id)!!}
		</nav> 
	@endif 
</section>
