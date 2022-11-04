@props(['subject'])

<div {{ $attributes->merge(['class' => 'py-5 pl-1 md:pl-10 break-all']) }}>
    <button type="button" class="flex justify-start items-center gap-1 md:gap-2">
        {{ $slot }}
        <div class="flex flex-col gap-[3px]">
            <div id="{{ "$subject-btn-asc" }}" class="w-0 h-0 border-x-[5px] border-x-transparent border-b-[5px] border-b-stone-400"></div>
            <div id="{{ "$subject-btn-desc" }}" class="w-0 h-0 border-x-[5px] border-x-transparent border-t-[5px] border-t-stone-400"></div>
        </div> 
    </button>
</div>