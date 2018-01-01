<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Vesper+Libre:700,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Yantramanav:100,400,900" rel="stylesheet">
{!! HTML::style('styles/css/font-awesome.min.css') !!}
{!! HTML::style('styles/css/DateTimePicker.css') !!}
{!! HTML::style('styles/css/grid/output.css') !!}
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

<body class="container-fluid">

    @include('layouts.partials.header')

    @yield('content')

    @include('layouts.partials.footer')

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
