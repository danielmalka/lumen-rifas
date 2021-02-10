<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ url('img/favicon.ico') }}" />
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    <meta name="description" content="Sistema de Rifas">
    <meta name="keywords" content="rifas,sistema,danlemos">
    <meta name="author" content="DanLemos">
    <title>@yield('title', "Rifa")</title>
    <style>
        .active{
            display: block;
        }
        @yield('styles')
    </style>
</head>
<body class="bg-grey-100 font-sans leading-normal tracking-normal">
    <div class="md:container md:mx-auto">
        <header id="top" class="w-full flex flex-col fixed sm:relative bg-white pin-t pin-r pin-l">
            @yield('nav')
            @yield('navigation')
        </header>
        <main class="w-full flex flex-col bg-white">
            @yield('content')
        </main>
    </div>
    <script src="{{ url('js/all.js') }}"></script>
    <script src="{{ url('js/menu.js') }}"></script>
    <script src="{{ url('js/overlay.js') }}"></script>
</body>
</html>
