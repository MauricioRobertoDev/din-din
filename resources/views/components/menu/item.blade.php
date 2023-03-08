@props(['href', 'icon', 'text', 'active' => false])

<a
    href="{{ $href }}"
    class='{{ $active ? '!bg-primary-50 !text-primary-500 !border-r-4 border-primary-500' : '' }} flex items-center h-12 group gap-4 px-4 text-gray-500 transition-all duration-300 hover:bg-gray-50 hover:text-gray-700'
>
    <x-dynamic-component
        component="icon.{{ $icon }}"
        class="w-5 h-5"
    />

    {{ $text }}
</a>
