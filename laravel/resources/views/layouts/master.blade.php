<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
{!! HTML::style('skeleton/css/normalize.css') !!}
{!! HTML::style('skeleton/css/skeleton.css') !!}
{!! HTML::style('styles/css/DateTimePicker.css') !!}
{!! HTML::style('styles/css/screen.css') !!}

@if($activeartist->hasBackground())
	<style>
		body {background-image: url({!!$activeartist->background()->path!!});
		}
		article {
			background-color: white;
		}
	</style>
@endif

</head>
<body>

	@include('layouts.partials.header')

    @if(Auth::check())
		@include('layouts.partials.nav')
	@endif
	@yield('content')

	{!! HTML::script('styles/js/jquery-2.1.3.min.js') !!}
	{!! HTML::script('styles/js/DateTimePicker.js') !!}

	<script type="text/javascript">
		$(document).ready(function()
 		{
        	$("#dtBox").DateTimePicker();

 		});
	</script>

<footer>

</footer>
</body>
</html>
