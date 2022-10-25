<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Coronatime - {{ $title }}</title>
        @vite("resources/css/app.css", "resources/js/helpers/Input.js", "resources/js/helpers/Validation.js")
        @stack('scripts')
    </head>
    
    <body>
        <header class="mt-6 md:mt-10 ml-4 md:ml-28">
            <x-UI.logo />
        </header>
        
        <main class="mt-10 md:mt-14 mx-4 md:mx-28">
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