@props(['action'])

<form id="form" action="{{ $action }}" method="POST" autocomplete="off" {{ $attributes->merge(['class' => 'flex w-full md:w-3/5 mt-6 flex-col gap-6']) }}>
    @csrf()
    {{ $slot }}
</form>