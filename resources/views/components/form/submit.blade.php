<button 
    type="submit" 
    {{ $attributes->merge(['class' => 'bg-green-500 text-white block w-full md:w-1/2 md:min-w-[24rem] py-4.5 text-sm md:text-base font-black rounded-lg']) }}
>
    {{ $slot }}
</button>