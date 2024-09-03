<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title', 'Title')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@200,300,400,500,600,700,1&display=swap" rel="stylesheet">
    <script src="{{ asset('scripts.js') }}"></script>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css','resources/js/app.js'])
  </head>
<body class="bg-back font-in font-feature-settings-cv11">

    {{-- @include('layouts.navbar') --}}
    <x-nav-bar></x-nav-bar>
    

    <main class="flex-grow">
        @yield('content')
    </main>

    <x-footer></x-footer>

    @yield('scripts')


</body>
</html>