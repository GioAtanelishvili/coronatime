<x-layouts.secondary-layout>
    <x-slot:title>
        {{ __('Reset password') }}
    </x-slot:title>

    <main class="mt-10 md:mt-48 px-4">
        <h1 class="text-2xl font-black text-center">{{ __('Reset Password') }}</h1>
        
        <x-form action="{{ route('password.update') }}" class="mt-10 md:mt-14 mx-auto items-center">
            @method('PATCH')

            <x-form.input type="password" name="password" id="password" placeholder="Enter your password" label="New password" />
            <x-form.input type="password" name="password_confirmation" id="password-confirmation" placeholder="Repeat password" label="Repeat password" />
            
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="hidden" name="token" value="{{ $token }}">
            
            <x-form.submit class="w-auto fixed md:static bottom-10 left-4 right-4">{{ __('RESET PASSWORD') }}</x-form.submit>
        </x-form>
    </main>
</x-layouts.secondary-layout>