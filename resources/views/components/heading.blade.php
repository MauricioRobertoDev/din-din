@props(['text'])

<div
    {{ $attributes }}
    class="container flex items-center justify-between w-full pb-8"
>
    <h1 class="text-4xl text-gray-700">{{ $text }}</h1>
    {{ $slot }}
</div>
