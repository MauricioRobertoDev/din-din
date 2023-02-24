<x-guest-layout>
    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-4 text-sm font-medium text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form
        method="POST"
        action="{{ route('login') }}"
        class="space-y-4"
    >
        @csrf

        <!-- Email Address -->
        <x-input.text
            :label="__('Email')"
            class="block w-full mt-1"
            type="email"
            name="email"
            :value="old('email')"
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
            autocomplete="current-password"
        />

        <!-- Remember Me -->
        <div class="block">
            <label
                for="remember_me"
                class="inline-flex items-center"
            >
                <input
                    id="remember_me"
                    type="checkbox"
                    class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500"
                    name="remember"
                />
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex flex-col items-center justify-end space-y-4">
            <x-button.primary class="w-full">
                {{ __('Log in') }}
            </x-button.primary>
            <div class="flex items-center justify-between w-full">
                <a
                    class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    href="{{ route('register') }}"
                >
                    Não tem uma conta?
                </a>
                @if (Route::has('password.request'))
                    <a
                        class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        href="{{ route('password.request') }}"
                    >
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
        </div>
    </form>
</x-guest-layout>
