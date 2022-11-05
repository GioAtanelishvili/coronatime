<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Coronatime - {{ $title }}</title>

        @vite('resources/css/app.css')
        
        @if (request()->routeIs('auth.login'))
            @vite('resources/js/login.js')
        @elseif (request()->routeIs('auth.register'))
            @vite('resources/js/register.js')
        @endif
    </head>
    
    <body>
        <header class="flex mt-6 md:mt-10 mx-4 md:mx-28 justify-between md:justify-start items-center gap-10">
            <x-UI.logo />
            <x-shared.select />
        </header>
        
        <main class="mt-10 md:mt-14 mb-4 mx-4 md:mx-28">
            <h1 class="text-black text-xl md:text-2xl font-black">{{ $heading }}</h1>
            <h2 class="text-zinc-500 mt-2 md:mt-4 text-base md:text-xl font-normal">{{ $subheading }}</h2>
            
            {{ $slot }}
            
            <footer class="text-zinc-500 w-full md:w-3/5 mt-6 text-center">
                {{ $footer }}
            </footer>

            <x-UI.vaccines />
        </main>
    </body>
</html>