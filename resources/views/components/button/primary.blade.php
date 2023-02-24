<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center py-3 min-h-min px-2 transition-all duration-300 lg:px-6 bg-primary-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-600 focus:bg-primary-600 active:bg-primary-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}
>
    {{ $slot }}
</button>
