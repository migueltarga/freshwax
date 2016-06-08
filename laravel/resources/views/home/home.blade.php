@extends('layouts.master')
@section('content')
<article class="forms">
	<header>
        @if(Auth::check())
            <h1>Welcome</h1>
        @endif
    </header>
</article>
@stop
