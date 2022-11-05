<x-layouts.secondary-layout>
    <x-slot:title>
        {{ __('Verify email') }}
    </x-slot:title>
    
    <main class="flex mt-48 md:mt-80 px-4 flex-col justify-center items-center gap-4">
        <x-UI.verification-notice-checkmark />
        <p class="text-lg text-center">
            {{ __('We have sent you a confirmation email') }}
        </p>
    </main>
</x-layouts.secondary-layout>