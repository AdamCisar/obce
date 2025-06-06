<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Obce</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @stack('viteEntries')
        <script>
            Translations = @json($translations ?? []);
        </script>
    </head>
    <body>
        @include('layouts.partials.header')
        <main>
            @yield('content')
        </main>
        @include('layouts.partials.footer')
    </body>
</html>
