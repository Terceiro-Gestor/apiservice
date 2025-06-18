<div>
    <!-- resources/views/components/text-input.blade.php -->
    @props([
        'type' => 'text',
        'name',
        'id' => null,
        'value' => '',
        'placeholder' => '',
        'autocomplete' => '',
    ])

    <input
        {{ $attributes->merge([
            'type' => $type,
            'name' => $name,
            'id' => $id ?? $name,
            'value' => old($name, $value),
            'placeholder' => $placeholder,
            'autocomplete' => $autocomplete,
            'class' =>
                'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm',
        ]) }} />
</div>
