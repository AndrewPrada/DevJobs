@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-sm uppercase mb-2 text-gray-500 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>