<x-guest-layout>
    <form
        method="POST"
        action="{{ route('register') }}"
        class="space-y-4"
    >
        @csrf

        <!-- Name -->
        <x-input.text
            :label="__('Name')"
            id="name"
            class="block w-full mt-1"
            type="text"
            name="name"
            :value="old('name')"
            required
            autofocus
            autocomplete="name"
        />

        <!-- Email Address -->
        <x-input.text
            :label="__('Email')"
            id="email"
            class="block w-full mt-1"
            type="email"
            name="email"
            :value="old('email')"
            required
            autocomplete="username"
        />

        <!-- Password -->
        <x-input.text
            :label="__('Password')"
            class="block w-full mt-1"
            type="password"
            name="password"
            required
            autocomplete="new-password"
        />

        <!-- Confirm Password -->
        <x-input.text
            :label="__('Confirm Password')"
            class="block w-full mt-1"
            type="password"
            name="password_confirmation"
            required
            autocomplete="new-password"
        />

        <div class="flex flex-col items-center justify-end mt-4 space-y-4">
            <x-button.primary class="w-full">
                {{ __('Register') }}
            </x-button.primary>

            <a
                class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                href="{{ route('login') }}"
            >
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
</x-guest-layout>
