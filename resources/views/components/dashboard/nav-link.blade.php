<li>
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'pb-4 text-xs md:text-base']) }}>
        {{ $slot }}
    </a>
</li>