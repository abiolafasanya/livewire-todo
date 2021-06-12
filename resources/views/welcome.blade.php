<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Livewire Todo Application</title>
        @livewireStyles
    </head>
    <body class="antialiased">
        
        {{-- @livewire('todo') --}}
        this is the welcome page new stuff coming soon
        <h1>Login to access todos</h1>
        <a href="{{ url('/register') }}" class="link">Click here to visit todo app</a>

        @livewireScripts
    </body>
</html>
