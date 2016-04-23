<section class="four columns"> 
		<h1>{{$p->name}}</h1>
		<p>{{$p->body}}</p>

		@if($p->photos->count())
			@foreach($p->photos as $i)
				<img src="{{$i->path}}" /> 
			@endforeach
		@endif

		<h4>
			@if($p->tags->count())
				@foreach($p->tags as $t)
					{{$t->tag}}
				@endforeach
			@endif
		</h4>

		@if(Auth::check() && Auth::user()->isadmin)
			<nav class="admin"> 
				{!!link_to_route('photos.post.create', 'Add Photo', $p->id)!!}
				{!!link_to_route('tags.post.create', 'Add Tags', $p->id)!!}
				{!!link_to_route('posts.edit', 'Edit', $p->id)!!}
				{!!link_to_route('posts.delete', 'Delete', $p->id)!!}
			</nav> 
		@endif 
</section>