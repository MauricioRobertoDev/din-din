<x-slot name="title"> Dashboard </x-slot>

<div class="container mx-auto">
    <x-heading text="Dashboard" />
    <div class="mx-auto space-y-6 max-w-7xl">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                {{ __("You're logged in!") }}
            </div>
        </div>
        {{ $user->name }}
        <div class="h-screen overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="w-1/2 h-full p-6 text-gray-900 bg-blue-500">
                {{ __("You're logged in!") }}
            </div>
        </div>
    </div>
</div>
