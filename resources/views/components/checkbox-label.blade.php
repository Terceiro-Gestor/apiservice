@props([
    'for'=> null,
    'value' => null
])

<label
    for="{{ $for }}"
    {{ $attributes->merge([
        'class' => 'w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300'
    ]) }}
>
    {{ $value ?? $slot }}
</label>