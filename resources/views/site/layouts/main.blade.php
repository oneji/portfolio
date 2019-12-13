<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Temur Kamilov</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style-demo.css') }}">
    </head>
    <body class="bg-triangles">
        @component('site.components.preloader')
        @endcomponent
        
        @yield('content')

        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/common.js') }}"></script>
        
        <script src="{{ asset('js/plugins-demo.js') }}"></script>
    </body>
</html>
