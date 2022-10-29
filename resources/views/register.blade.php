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
        <x-forms.input name="name" id="name" placeholder="Enter unique username or email" label="Username" />
        <x-forms.input type="email" name="email" id="email" placeholder="Enter your email" label="Email" />
        <x-forms.input type="password" name="password" id="password" label="Password" placeholder="Fill in password" />
        <x-forms.input type="password" name="repeatPassword" id="repeat-password" placeholder="Repeat password" label="Repeat password"  />
        
        <x-forms.submit>SIGN UP</x-forms.submit>
    </x-forms.auth-form>

    <x-slot:footer>
        <p class="w-full md:w-1/2 md:min-w-[24rem]">Already have an account? <a href="{{ route('auth.login') }}" class="text-black font-bold">Log in</a></p>
    </x-slot:footer>
</x-layouts.auth-layout>