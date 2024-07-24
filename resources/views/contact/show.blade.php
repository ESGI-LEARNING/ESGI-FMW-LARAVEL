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
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="px-6 py-5 bg-white border-b border-gray-400">
                    <h3 class="text-lg font-semibold text-gray-900">Formulaire de contact</h3>
                </div>
                <div class="border-t border-gray-200">
                    <div class="px-6 py-5">
                        <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                            @csrf
                            <div class="space-y-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                                    <input type="text" id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" id="email" name="email" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                </div>

                                <div>
                                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                                    <textarea id="message" name="message" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="6" required></textarea>
                                </div>
                            </div>

                            <x-modules.button.primary-button>
                                Envoyer
                            </x-modules.button.primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
