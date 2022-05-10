<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The Library</title>
        <!-- W3.CSS and W3 Colours-->
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">

        <link rel="stylesheet" href="{{ URL::to('css/main.css') }}">

		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Permanent Marker' rel='stylesheet'>
		<link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-1M339YFFNB"></script>
    </head>
    <body>
        @include('components.header')
        @if( !strpos(url()->current(),'password') )
            @include('components.navigation')
        @else
            @include('components.hdr_bar')
        @endif

        <div class="w3-container">
            @yield('content')
        </div>
    </body>
    <script  src="{{ URL::to('js/main.js') }}"></script>
</html>
