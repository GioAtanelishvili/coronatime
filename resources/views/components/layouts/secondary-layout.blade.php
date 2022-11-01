<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Coronatime - {{ $title }}</title>

        @vite('resources/css/app.css')

        @if (request()->routeIs('password.request'))
            @vite('resources/js/forgot-password.js')
        @elseif (request()->routeIs('password.reset'))
            @vite('resources/js/reset-password.js')
        @endif
    </head>
    
    <body>
        <header class="mt-6 md:mt-10 flex justify-center">
            <x-UI.logo />
        </header>
        
        {{ $slot }}
    </body>
</html>