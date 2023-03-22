@props(['value'])

<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'text-white rounded-lg border-none p-2 my-3 hover:hover-button font-medium']) }}>
    {{ $value ?? $slot }}
</button>
