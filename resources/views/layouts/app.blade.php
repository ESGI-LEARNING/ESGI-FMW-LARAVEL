<x-base-layout>
    <x-slot name="noindex">{{ $noindex = false }}</x-slot>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="description">{{ $description }}</x-slot>
    <x-slot name="assets">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </x-slot>
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset
        @include('layouts.session')
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</x-base-layout>

