@props(['value'])

<label {{ $attributes->merge(['class' => 'text-lg font-semibold text-gray-600']) }}>
    {{ $value ?? $slot }}
</label>
