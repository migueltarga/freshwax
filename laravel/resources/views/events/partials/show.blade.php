<section class="four columns"> 
				<h1>{{$e->name}}</h1>
				<h2>{{$e->time}}</h2>
				<h3>{{$e->location}}</h3>

				@if($e->photos->count())
					@foreach($e->photos as $p)
						<img src="{{$p->path}}" /> 
					@endforeach
				@endif

				<h4>
				@if($e->tags->count())
					@foreach($e->tags as $t)
						{{$t->tag}}
					@endforeach
				@endif
				</h4>

				@if(Auth::check() && Auth::user()->isadmin)
					<nav class="admin"> 
						{!!link_to_route('photos.event.create', 'Add Photo', $e->id)!!}
						{!!link_to_route('tags.event.create', 'Add Tags', $e->id)!!}
						{!!link_to_route('events.edit', 'Edit', $e->id)!!}
						{!!link_to_route('events.delete', 'Delete', $e->id)!!}
					</nav> 
				@endif 
</section> 