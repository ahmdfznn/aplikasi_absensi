<x-main>
    <x-slot:title>{{ $title }}</x-slot>
        <x-pages>
            <h1 class="text-2xl font-medium text-gray-600">Welcome back {{ auth()->user()->name }}</h1>
        </x-pages>
</x-main>
