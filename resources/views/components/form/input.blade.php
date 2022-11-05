@props(['id', 'label', 'name', 'type' => 'text', 'placeholder'])

@php
    $isValid = old($name) && !$errors->first($name);
    $isInvalid = $errors->first($name);
    $isPassword = $type === 'password'
@endphp

<div class="flex w-full md:w-1/2 md:min-w-[24rem] relative flex-col gap-2">
    <label for="{{ $id }}" class="text-black text-sm md:text-base font-bold">{{ __($label) }}</label>
    <input 
        type="{{ $type }}" 
        name="{{ $name }}" 
        id="{{ $id }}" 
        value="@if(!$isPassword){{ old($name) }}@endif"
        placeholder="{{ __($placeholder) }}" 
        @class(['text-black placeholder:text-zinc-500 py-4.5 px-6 text-base font-normal border focus:border-blue-700 rounded-lg focus:shadow-input outline-none', 'border-neutral-200', 'border-green-600' => $isValid && !$isPassword, 'border-red-700' => $isInvalid])
    >

    @if ($isValid && !$isPassword)
        <x-form.success :$name />
    @endif

    @error($name)
        <x-form.error :$name :$message/>
    @enderror
</div>