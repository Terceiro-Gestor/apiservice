<div class="relative z-0 w-full mb-5 group">
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
                'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer',
        ]) }} />
</div>