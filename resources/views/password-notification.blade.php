<x-layouts.secondary-layout>
    <x-slot:title>
        {{ __('Reset password') }}
    </x-slot:title>
    
    <main class="flex w-full md:w-3/5 mt-48 md:mt-60 mx-auto px-4 flex-col justify-center items-center gap-4">
        <x-UI.verification-notice-checkmark />
        <p class="text-lg text-center">
            {{ __('Your password has been updated successfully') }}
        </p>

        <a href="{{ route('auth.login') }}" class="bg-green-500 text-white block w-auto md:w-1/2 md:min-w-[24rem] mt-20 py-4.5 fixed md:static bottom-10 left-4 right-4 text-sm md:text-base text-center font-black rounded-lg">
            {{ __('SIGN IN') }}
        </a>
    </main>
</x-layouts.secondary-layout>