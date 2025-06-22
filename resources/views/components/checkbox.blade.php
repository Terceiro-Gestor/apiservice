@props([
    'type' => 'checkbox',
    'name',
    'id' => null,
    'value' => 1,
    'checked' => false,
])

@php
    $inputId = $id ?? $name;
    $isChecked = old($name, $checked) ? 'checked' : '';
@endphp

<input type="hidden" name="{{ $name }}" value="0">

<input type="checkbox" name="{{ $name }}" id="{{ $inputId }}" value="{{ $value }}" {{ $isChecked }}
    {{ $attributes->merge([
        'class' =>
            'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600',
    ]) }} />
