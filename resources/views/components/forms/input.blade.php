@props(['id', 'label', 'name', 'type' => 'text', 'placeholder'])

<div class="flex w-full md:w-1/2 md:min-w-[24rem] relative flex-col gap-2">
    <label for="{{ $id }}" class="text-black text-sm md:text-base font-bold">{{ $label }}</label>
    <input 
        type="{{ $type }}" 
        name="{{ $name }}" 
        id="{{ $id }}" 
        placeholder="{{ $placeholder }}" 
        class="text-black placeholder:text-zinc-500 py-4.5 px-6 text-base font-normal border border-neutral-200 focus:border-blue-700 rounded-lg focus:shadow-input outline-none"
    >
</div>