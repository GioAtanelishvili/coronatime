<x-layouts.auth-layout>
    <x-slot:title>
        {{ __('Log In') }}
    </x-slot:title>

    <x-slot:heading>
        {{ __('Welcome back') }}
    </x-slot:heading>

    <x-slot:subheading>
        {{ __('Welcome back! Please enter your details') }}
    </x-slot:subheading>

    <x-form action="{{ route('auth.login') }}">
        <x-form.input name="name" id="name" placeholder="Enter unique username or email" label="Username" />
        <x-form.input type="password" name="password" id="password" placeholder="Fill in password" label="Password" />

        <div class="flex w-full md:w-1/2 md:min-w-[24rem] pt-1 justify-between items-center">
            <x-form.checkbox />
            <a href="{{ route('password.request') }}" class="text-blue-700 text-sm font-semibold">{{ __('Forgot password?') }}</a>
        </div>
        
        <x-form.submit>{{ __('LOG IN') }}</x-form.submit>
    </x-form>

    <x-slot:footer>
        <p class="w-full md:w-1/2 md:min-w-[24rem]">
            {{ __('Don\'t have an account?') }} 
            <a href="{{ route('auth.register') }}" class="text-black font-bold">
                {{ __('Sign up for free') }}
            </a>
        </p>
    </x-slot:footer>
</x-layouts.auth-layout>
