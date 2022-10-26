<x-layouts.auth-layout>
    <x-slot:title>
        Sign Up
    </x-slot:title>

    <x-slot:heading>
        Welcome to Coronatime
    </x-slot:heading>

    <x-slot:subheading>
        Please enter required info to sign up
    </x-slot:subheading>

    <x-forms.auth-form action="{{ route('auth.register') }}">
        <x-forms.input id="username" label="Username" name="username" placeholder="Enter unique username or email" />
        <x-forms.input id="email" label="Email" name="email" placeholder="Enter your email" />
        <x-forms.input id="password" label="Password" name="password" placeholder="Fill in password" />
        <x-forms.input id="repeat-password" label="Repeat password" name="repeatPassword" placeholder="Repeat password" />
        
        <x-forms.submit>SIGN UP</x-forms.submit>
    </x-forms.auth-form>

    <x-slot:footer>
        <p class="w-full md:w-1/2 md:min-w-[24rem]">Already have an account? <a href="{{ route('auth.login') }}" class="text-black font-bold">Log in</a></p>
    </x-slot:footer>
</x-layouts.auth-layout>