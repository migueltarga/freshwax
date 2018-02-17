<section class="user">
	<h1>{{$user->name}}</h1>
	<h2><a href="mailto:{{$user->email}}">{{$user->email}}</a></h2>
	<ul>
		@foreach($user->roles as $r)
			<li>$r->name</li>
		@endforeach
	</ul>
	@include('users.partials.adminnav')
</section>
