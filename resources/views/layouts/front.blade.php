<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }} | @yield('title', 'Title')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@200,300,400,500,600,700,1&display=swap" rel="stylesheet">
    <script src="{{ asset('scripts.js') }}"></script>
  </head>
<body class="bg-back">

    @include('layouts.navbar')
    

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('layouts.footer')

    @yield('scripts')


</body>
</html>