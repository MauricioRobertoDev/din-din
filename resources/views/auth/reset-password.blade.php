<x-guest-layout>
    <form
        method="POST"
        action="{{ route('password.store') }}"
        class="space-y-4"
    >
        @csrf

        <!-- Password Reset Token -->
        <input
            type="hidden"
            name="token"
            value="{{ $request->route('token') }}"
        />

        <!-- Email Address -->
        <x-input.text
            :label="__('Email')"
            class="block w-full mt-1"
            type="email"
            name="email"
            :value="old('email', $request->email)"
            required
            autofocus
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

        <div class="flex items-center justify-end mt-4">
            <x-button.primary class="w-full">
                {{ __('Reset Password') }}
            </x-button.primary>
        </div>
    </form>
</x-guest-layout>
