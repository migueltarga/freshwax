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

				@if(Auth::check())
					@if(Auth::user()->isadmin)
					<nav class="admin"> 
						@if(!$a->active_profile)
							{!!link_to_route('artists.makeactive', 'Activate', $a->id)!!}
						@else 
							<p class="center">Active Profile</p>
						@endif
						{!!link_to_route('photos.artist.create', 'Add Photo', $a->id)!!}
						{!!link_to_route('artists.edit', 'Edit', $a->id)!!}
						{!!link_to_route('artists.delete', 'Delete', $a->id)!!}
						@if($a->hasBanner())

						@endif 

						@if($a->hasBackground())
						
						@endif 
					</nav> 
					@endif
				@endif 

</section>
