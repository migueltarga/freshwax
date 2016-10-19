<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,900|Trocchi" rel="stylesheet">
{!! HTML::style('styles/css/DateTimePicker.css') !!}
{!! HTML::style('styles/css/screen.css') !!}
{!! HTML::style('styles/css/grid/output.css') !!}

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

<body class="container">

    @include('layouts.partials.header')

    @yield('content')

    @include('layouts.partials.footer')

    {!! HTML::script('styles/js/jquery-2.1.3.min.js') !!}
    {!! HTML::script('styles/js/DateTimePicker.js') !!}

<script type="text/javascript">

$(document).ready(function()
{
    $("#dtBox").DateTimePicker();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});

</script>

</body>
</html>
