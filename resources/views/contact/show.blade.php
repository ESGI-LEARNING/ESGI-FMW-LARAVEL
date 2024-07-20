<!-- resources/views/contact/show.blade.php -->
<x-app-layout>
    <x-slot name="title">Contactez-nous</x-slot>
    <x-slot name="description">Page de contact pour nous envoyer un message.</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contactez-nous') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Formulaire de contact</h3>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            @if (session('success'))
                                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                                    <input type="text" id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" id="email" name="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                </div>

                                <div class="form-group">
                                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                                    <textarea id="message" name="message" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="5" required></textarea>
                                </div>

                                <div class="px-4 py-3 text-right sm:px-6">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Envoyer</button>
                                </div>
                            </form>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
