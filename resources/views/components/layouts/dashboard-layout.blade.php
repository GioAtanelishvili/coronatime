<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Coronatime - {{ $title }}</title>

        @vite('resources/css/app.css')

        @if (request()->routeIs('dashboard.country'))
            @vite('resources/js/countries.js')
        @endif
    </head>
    
    <body>
        <header class="flex mt-6 md:mt-5 ml-4 md:ml-28 mr-8 md:mr-28 justify-between items-center">
            <x-UI.logo />

            <x-dashboard.burger-menu />

            <div class="hidden md:flex items-center gap-4">
                <span class="text-base font-bold capitalize">{{ auth()->user()->name }}</span>
                <div class="bg-neutral-200 w-[1px] h-8"></div>
                <form action="{{ route('auth.logout') }}" method="post">
                    @csrf()
                    <button type="submit">{{ __('Log Out') }}</button>
                </form>
            </div>
        </header>
        
        <main class="mt-11 md:mt-14 mb-4 mx-4 md:mx-28">
            <h1 class="text-black text-xl md:text-2xl font-black">{{ __('Worldwide Statistics') }}</h1>
            
            <x-dashboard.nav />

            {{ $slot }}
        </main>
    </body>
</html>