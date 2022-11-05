@props(['column'])

<div {{ $attributes->merge(['class' => 'py-5 pl-1 md:pl-10 break-all']) }}>
    <button id="{{ "$column-btn" }}" type="button" class="flex justify-start items-center gap-1 md:gap-2 text-left">
        {{ $slot }}
        <div class="flex flex-col gap-[3px]">
            <div id="{{ "$column-arrow-desc" }}" class="arrow-desc w-0 h-0 border-x-[5px] border-x-transparent border-b-[5px] border-b-stone-400"></div>
            <div id="{{ "$column-arrow-asc" }}" @class(['arrow-asc w-0 h-0 border-x-[5px] border-x-transparent border-t-[5px] border-t-stone-400', 'border-t-black' => $column === 'location']) class=""></div>
        </div> 
    </button>
</div>