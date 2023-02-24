<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form
        method="POST"
        action="{{ route('password.confirm') }}"
        class="space-y-4"
    >
        @csrf

        <!-- Password -->
        <x-input.text
            :label="__('Password')"
            class="block w-full mt-1"
            type="password"
            name="password"
            required
            autocomplete="current-password"
        />

        <div class="flex justify-end mt-4">
            <x-button.primary class="w-full">
                {{ __('Confirm') }}
            </x-button.primary>
        </div>
    </form>
</x-guest-layout>
