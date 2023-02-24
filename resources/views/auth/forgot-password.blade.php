<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-4 text-sm font-medium text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form
        method="POST"
        action="{{ route('password.email') }}"
    >
        @csrf

        <!-- Email Address -->
        <x-input.text
            :label="__('Email')"
            class="block w-full"
            type="email"
            name="email"
            :value="old('email')"
            required
            autofocus
        />

        <div class="flex items-center justify-end mt-4">
            <x-button.primary class="w-full">
                {{ __('Email Password Reset Link') }}
            </x-button.primary>
        </div>
    </form>
</x-guest-layout>
