<header>
    @if($activeartist->hasBanner())
    <!--
        <img src="{!!$activeartist->banner()->path!!}" />
    -->
    @else
		<h1>{!!$activeartist->name!!}</h1>
		@if(isset($activeartist->id) && Auth::check() && Auth::user()->isadmin)
			<nav>
				{!!link_to_route('artists.addbanner', 'Replace with Banner Image', $activeartist->id)!!}
			</nav>
		@endif
	@endif


</header>
