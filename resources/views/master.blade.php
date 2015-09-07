<!DOCTYPE html>
<html>
<head>
    <title>InstaLar - @yield('title')</title>

    <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    @yield('stylesheets')

    <script language="javascript" type="text/javascript" async src="{{ URL::asset('js/jquery/jquery-2.1.4.js') }}"></script>
</head>
<body>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>