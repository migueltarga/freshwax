<section class="four columns">
		<header>
				<h1>{{$i->name}}</h1>
				<h2>{{$i->description}}</h2>
				<h2>${{$i->total}}</h2>
		</header>
				@if($i->photos->count())
					@foreach($i->photos as $p)
						<img src="{{$p->path}}" />
					@endforeach
				@endif

			@include('items.partials.controls')

			<h4>
				@if($i->tags->count())
					@foreach($i->tags as $t)
						{{$t->tag}}
					@endforeach
				@endif
			</h4>

			@if(Auth::check() && Auth::user()->isadmin)
				<nav class="admin">
					{!!link_to_route('photos.item.create', 'Add Photo', $i->id)!!}
					{!!link_to_route('tags.item.create', 'Add Tags', $i->id)!!}
					{!!link_to_route('items.edit', 'Edit', $i->id)!!}
					{!!link_to_route('items.delete', 'Delete', $i->id)!!}
				</nav>
			@endif
</section>
