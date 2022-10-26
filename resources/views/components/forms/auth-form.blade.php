@props(['action'])

<form id="form" action="{{ $action }}" method="POST" autocomplete="off" class="flex w-full md:w-3/5 mt-6 flex-col gap-8">
    @csrf()
    {{ $slot }}
</form>