<x-layouts.auth-layout>
    <x-slot:title>
        Log In
    </x-slot:title>

    <x-slot:heading>
        Welcome back
    </x-slot:heading>

    <x-slot:subheading>
        Welcome back! Please enter your details
    </x-slot:subheading>

    <x-forms.auth-form action="{{ route('auth.login') }}">
        <x-forms.input id="username" label="Username" name="username" placeholder="Enter unique username or email" />
        <x-forms.input id="password" label="Password" name="password" placeholder="Fill in password" />

        <div class="flex w-full md:w-1/2 md:min-w-[24rem] justify-between items-center">
            <x-forms.checkbox />
            <a href="#" class="text-blue-700 text-sm font-semibold">Forgot password?</a>
        </div>
        
        <x-forms.submit>LOG IN</x-forms.submit>
    </x-forms.auth-form>

    <x-slot:footer>
        <p class="w-full md:w-1/2 md:min-w-[24rem]">Don't have an account? <a href="{{ route('auth.register') }}" class="text-black font-bold">Sign up for free</a></p>
    </x-slot:footer>
</x-layouts.auth-layout>
