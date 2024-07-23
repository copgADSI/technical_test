<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> {{ env('APP_NAME')}} - {{ $title ?? ':)'   }}</title>
        @vite('resources/scss/app.scss')
	    @yield('css')

    </head>
    <body class="antialiased">
        <x-page-layout.header></x-page-layout.header>
        <div id="app">
            {{ $slot }}
        </div>
        @vite('resources/js/app.js')
        @stack('scripts')
    </body>
</html>
