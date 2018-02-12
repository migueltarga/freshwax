<section class="third">
		<a href="{{route('labels.show', $label->id)}}">
			<h1>{{$label->name}}</h1>
			<h2>{{$label->city}}</h2>
			<p>{{$label->about}}</p>
		</a>

		@foreach($label->photos as $p)
			@if(!$p->banner && !$p->background && Storage::disk('spaces')->exists($p->path))
				<img src="{{Storage::disk('spaces')->url($p->path)}}" class="img-circle img-responsive" />
			@endif
		@endforeach

		@if(Auth::check() && $label->hasUser(Auth::user()->id))
			@include('labels.partials.adminnav')
		@endif
</section>
