<section class="grid w-full mt-6 md:mt-10 fixed md:static left-0 text-sm text-left border border-neutral-100 md:rounded-lg overflow-hidden">
    <div class="bg-neutral-100 grid w-full grid-cols-4 md:grid-cols-table items-center">
        <x-dashboard.stats-header subject="location">Location</x-dashboard.stats-header>
        <x-dashboard.stats-header subject="confirmed">New cases</x-dashboard.stats-header>
        <x-dashboard.stats-header subject="deaths">Deaths</x-dashboard.stats-header>
        <x-dashboard.stats-header subject="recovered">Recovered</x-dashboard.stats-header>
    </div>

    <div id="tbody" class="max-h-[calc(100vh-18rem)] md:max-h-[calc(100vh-24rem)] overflow-auto">
        @foreach ($countries as $country)
            <div class="grid w-full grid-cols-4 border-b border-b-neutral-100 break-all">
                <div class="py-4.5 pl-1 md:pl-10">{{ $country->name['en'] }}</div>
                <div class="py-4.5 pl-1 md:pl-10">{{ $format($country->confirmed) }}</div>
                <div class="py-4.5 pl-1 md:pl-10">{{ $format($country->deaths) }}</div>
                <div class="py-4.5 pl-1 md:pl-10">{{ $format($country->recovered) }}</div>
            </div>
        @endforeach
    </div>
</section>