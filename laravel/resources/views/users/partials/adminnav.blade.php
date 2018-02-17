@can('update', $user)
	<nav>
		<a href="{!! route('users.addrole',  $user->id) !!}">
			<i class="fa fa-plus"></i> Role
		</a>
		<a href="{!! route('users.edit',  $user->id) !!}">
			<i class="fa fa-pencil"></i>
		</a>
		<a href="{!! route('users.destroy', $user->id) !!}">
			<i class="fa fa-trash"></i>
		</a>
	</nav>
@endcan
