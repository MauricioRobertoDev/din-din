<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center h-10 px-6 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 focus:bg-red-600 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}
>
    {{ $slot }}
</button>
