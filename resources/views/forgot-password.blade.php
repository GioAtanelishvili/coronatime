<x-layouts.secondary-layout>
    <x-slot:title>
        {{ __('Reset password') }}
    </x-slot:title>

    <main class="mt-10 md:mt-48 px-4">
        <h1 class="text-2xl font-black text-center">{{ __('Reset Password') }}</h1>
        
        <x-form action="{{ route('password.email') }}" class="mt-10 md:mt-14 mx-auto items-center">
            <x-form.input type="email" name="email" id="email" placeholder="Enter your email" label="Email" />
            
            <x-form.submit class="w-auto fixed md:static bottom-10 left-4 right-4">{{ __('RESET PASSWORD') }}</x-form.submit>
        </x-form>
    </main>
</x-layouts.secondary-layout>