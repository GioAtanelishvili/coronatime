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

    <x-form action="{{ route('auth.register') }}">
        <x-form.input name="name" id="name" placeholder="Enter unique username or email" label="Username" />
        <x-form.input type="email" name="email" id="email" placeholder="Enter your email" label="Email" />
        <x-form.input type="password" name="password" id="password" label="Password" placeholder="Fill in password" />
        <x-form.input type="password" name="repeatPassword" id="repeat-password" placeholder="Repeat password" label="Repeat password"  />
        
        <x-form.submit>SIGN UP</x-form.submit>
    </x-form>

    <x-slot:footer>
        <p class="w-full md:w-1/2 md:min-w-[24rem]">Already have an account? <a href="{{ route('auth.login') }}" class="text-black font-bold">Log in</a></p>
    </x-slot:footer>
</x-layouts.auth-layout>