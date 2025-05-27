<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Obce</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    </head>
    <body>
    
        <div class="container mt-5">
            <h1 class="text-center text-primary">Bootstrap is Working!</h1>
            <button class="btn btn-primary mt-3">Test Button</button>
            <p class="text-danger">This text is red.</p>
        </div>
    </body>
</html>
