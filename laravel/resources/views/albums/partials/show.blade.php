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

@include('albums.partials.adminnav')

</section>
