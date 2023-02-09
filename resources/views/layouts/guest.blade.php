<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/js/app.js'])
    </head>
    <body class="m-5 p-5">
        <div class="card">
            <div class="card-header">
                <div  class="hstack gap-2">
                    <div><img src="/logo.png" class="logo"></div>
                    <div><h2>Fuel Saving Calculator </h2></div>
                </div>
            </div>

            <div class="card-body mainContainer">
                {{ $slot }}
            </div>
            @if(env('APP_DEBUG'))
                <div class="card-footer">
                    <button class="prev" >Previous</button>
                    <button class="next" >Next</button>
                </div>
            @endif
        </div>
    </body>
</html>
