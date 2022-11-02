<nav>
    <ul class="flex mt-6 md:mt-10 pb-4">
        <x-dashboard.nav-link 
            href="{{ route('dashboard.worldwide') }}" 
            @class(['mr-6 md:mr-20', 'font-bold border-b-[3px] border-b-black' => request()->routeIs('dashboard.worldwide')])
        >
            Worldwide
        </x-dashboard.nav-link>

        <x-dashboard.nav-link 
            href="{{ route('dashboard.country') }}"
            @class(['font-bold border-b-[3px] border-b-black' => request()->routeIs('dashboard.country')])
        >
            By country
        </x-dashboard.nav-link>
    </ul>
</nav>