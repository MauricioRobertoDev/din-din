<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    />
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    />

    <title>
        @if (isset($title))
            {{ $title }} -
        @endif
        {{ config('app.name', 'Laravel') }}
    </title>

    <link
        rel="icon"
        type="image/x-icon"
        href="/svg/logo.svg"
    >

    <!-- Fonts -->
    <link
        rel="stylesheet"
        href="https://fonts.bunny.net/css2?family=Inter:wght@400;600;700&display=swap"
    >

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <livewire:styles />
</head>

<body
    class="z-0 flex w-screen h-screen overflow-hidden font-sans antialiased bg-gray-100"
    x-data="{ openMenu: false }"
    x-on:toggle-menu.window="openMenu = !openMenu"
>
    <x-menu.navbar />

    <main
        class="flex-grow w-full h-full px-4 py-8 overflow-y-auto sm:px-6 sm:py-12 lg:scrollbar-thin lg:scrollbar-thumb-primary-500 lg:scrollbar-track-white"
    >
        {{ $slot }}
    </main>

    <livewire:scripts />
</body>

</html>
