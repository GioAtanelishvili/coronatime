<article {{ $attributes->merge(['class' => 'flex py-6 md:py-10 flex-col justify-end items-center gap-4 rounded-2xl']) }}>
    {{ $icon }}

    <h2 class="px-5 text-base md:text-xl font-medium text-center break-all">{{ $title }}</h2>

    <div class="text-2xl md:text-4xl font-black">{{ $stat }}</div>
</article>