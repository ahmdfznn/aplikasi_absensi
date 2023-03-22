@props(['value'])

<button
    {{ $attributes->merge(['class' => 'text-white rounded-lg p-2 my-3 font-semibold shadow-button border border-slate-100 hover:hover-button']) }}>
    {{ $value ?? $slot }}
</button>
