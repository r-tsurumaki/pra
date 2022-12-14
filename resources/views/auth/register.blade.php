<x-guest-layout>
    <x-auth-card>
        <link rel="stylesheet" href="style.css" >
        <x-slot name="logo">
            <a href="/">
                {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
            </a>

            <style>
                h1 {
                        background-color: #dedcdc;
                        animation: bg-color 0.75s infinite;
                    }
                    @keyframes bg-color {
                        0% { color: red }
                        20% { color: yellow; }
                        40% { color: green; }
                        60% { color: blue; }
                        80% { color: purple; }
                        100% { color: red; }
                    }
                </style>
        </x-slot>

        <h1>登録</h1>




        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf


            <h1></h1>

            <!-- Name -->
            <div class="wrapper">
                {{-- <x-label for="name" :value="__('Name')" /> --}}
                <h1 id = "name">Name</p>
                <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <h1 id = "email">Email</p>

                <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <h1 id = "password">password</p>

                <input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <h1 id = "password_confirmation">Confirm Password</p>
                <input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{-- {{ __('Already registered?') }} --}}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
