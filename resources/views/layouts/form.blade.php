<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@200,300,400,500,600,700,1&display=swap" rel="stylesheet">
    <script src="{{ asset('scripts.js') }}"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
  </head>
<body class="bg-back">

    <x-nav-bar></x-nav-bar>
    

    <main class="flex-grow">
        @yield('content')
    </main>

    <x-footer></x-footer>

    @yield('scripts')


</body>
</html>