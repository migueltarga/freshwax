@extends('layouts.master')

@section('content')
<article class="forms">

    <header>
				<h1>Login</h1>
	</header>
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
@if(!Auth::check())
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">

							<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<p>
							<label class="col-md-4 control-label">E-Mail Address</label>

							<input type="email" class="form-control" name="email" value="{{ old('email') }}">
						</p>
						<p>
							<label class="col-md-4 control-label">Password</label>

							<input type="password" class="form-control" name="password">
						</p>
						<p>
							<label>
								<input type="checkbox" name="remember"> Remember Me
							</label>
							{!!Form::submit('login')!!}
						</p>
						<p>
							<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
						</p>
					</form>
                    @else
                        <h2>You are already logged in!</h2>
                    @endif
</article>
@endsection
