<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>{{ config('app.name', 'Laravel') }}</title>

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
</head>

<body class="font-sans antialiased text-gray-900 flex bg-white">
    <div class="flex flex-col items-center justify-between min-h-screen pt-6 sm:pt-0 flex-grow">
        <div class="flex flex-col items-center justify-center flex-shrink w-full sx:px-2 grow relative">
            <div>
                <a href="/">
                    <x-icon.logo class="w-20 h-20 text-primary-500" />
                </a>
            </div>

            <div class="w-full px-6 py-4 mt-6 overflow-hidden sm:max-w-md sm:rounded-lg ">
                {{ $slot }}
            </div>
        </div>

        <div class="flex items-center justify-center w-full py-4 text-sm">
            <div>
                {{ config('app.name') }} - Feito com ❤️ por
                <a
                    href="https://github.com/MauricioRobertoDev"
                    class="hover:text-primary-500"
                >Mauricio Roberto</a>
            </div>
        </div>

    </div>
</body>

</html>
