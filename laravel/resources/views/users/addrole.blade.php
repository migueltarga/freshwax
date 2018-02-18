@extends('layouts.master')

@section('content')
<article>
	<header class="jumbotron">
		<h1>
			Add Role to {{$user->name}}
		</h1>
	</header>

	{!!Form::open(['route'=>'users.role.store'])!!}
		{!!Form::hidden('user_id', $user->id)!!}
		<div class="form-group"
			<label for="role_id" class="form-label">Role</label>

			<select name="role_id"
					class="form-control">
				@foreach($roles as $r)
					<option value="{{$r->id}}">{{$r->name}}</option>
				@endforeach
			<select>
		</div>
		<button type="submit" class="btn btn-default pull-right">
			<i class="fa fa-plus"> </i> Role
		</button>
	{!!Form::close()!!}

</article>


@endsection
