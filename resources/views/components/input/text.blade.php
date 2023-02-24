@props([
    'disabled' => false,
    'label' => null,
    'name',
])

<div>
    @if ($label)
        <x-input.label
            :value="$label"
            for="{{ $name }}"
        />
    @endif

    <input
        {{ $disabled ? 'disabled' : '' }}
        {!! $attributes->merge([
            'class' => 'border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm mt-1',
        ]) !!}
        name="{{ $name }}"
        id="{{ $name }}"
    />

    @if ($errors->has($name))
        <x-input.error
            :messages="$errors->get($name)"
            class="mt-2"
        />
    @endif
</div>
