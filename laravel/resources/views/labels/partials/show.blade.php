<section class="third">
		<a href="{{route('labels.show', $l->id)}}">
			<h1>{{$l->name}}</h1>
			<h2>{{$l->city}}</h2>
			<p>{{$l->about}}</p>
		</a>
		@if(Auth::check() && $l->hasUser(Auth::user()->id))
			@include('labels.partials.adminnav')
		@endif
</section>
