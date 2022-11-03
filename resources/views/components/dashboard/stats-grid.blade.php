<section class="grid mt-6 md:mt-10 grid-cols-2 md:grid-cols-3 justify-items-stretch gap-4 md:gap-6 2xl:gap-24">
    <x-dashboard.stat-card class="bg-[rgba(29,78,216,0.2)] col-span-2 md:col-span-1">
        <x-slot:icon>
            <x-UI.new-cases-stats-icon />
        </x-slot:icon>

        <x-slot:title>
            New cases
        </x-slot:title>

        <x-slot:stat>
            <span class="text-blue-700">{{ $format($confirmed) }}</span>
        </x-slot:stat>
    </x-dashboard.stat-card>

    <x-dashboard.stat-card class="bg-[rgba(34,197,94,0.2)]">
        <x-slot:icon>
            <x-UI.recovered-stats-icon />
        </x-slot:icon>

        <x-slot:title>
            Recovered
        </x-slot:title>

        <x-slot:stat>
            <span class="text-green-500">{{ $format($recovered) }}</span>
        </x-slot:stat>
    </x-dashboard.stat-card>

    <x-dashboard.stat-card class="bg-[rgba(234,214,33,0.2)]">
        <x-slot:icon>
            <x-UI.death-stats-icon />
        </x-slot:icon>

        <x-slot:title>
            Death
        </x-slot:title>

        <x-slot:stat>
            <span class="text-yellow-400">{{ $format($deaths) }}</span>
        </x-slot:stat>
    </x-dashboard.stat-card>
</section>