@extends('layouts.master')

@section('content')
<article class="container-fluid">
<header class="jumbotron">
<h1>Login</h1>
</header>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="input-group-addon">E-Mail Address</label>

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="input-group-addon">Password</label>

                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            <p class="input-group-addon"> Remember Me {!! Form::checkbox('remember', (1 or true), null) !!}</p>
                        </div>


                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-default" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
</article>
@endsection
