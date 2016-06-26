<section class="four columns">
				<h1>{{$a->name}}</h1>
				<h2>{{$a->hometown}}</h2>
				<p>{{$a->bio}}</p>

				@foreach($a->photos as $p)
					@if(!$p->banner && !$p->background)
						<img src="{{$p->path}}" />
					@endif
				@endforeach

				@if($a->hasBanner())
					<h3>Banner</h3>
					<img src="{{$a->banner()->path}}">
				@endif

				@if($a->hasBackground())
					<h3>Background</h3>
					<img src="{{$a->background()->path}}">
				@endif

				@if(Auth::check() && isset($a->user) && Auth::user()->id == $a->user->id)
                    @include('artists.partials.adminnav')
                @endif
</section>
