<x-base-layout>
    <x-slot name="noindex">{{ $noindex = false }}</x-slot>
    <x-slot name="title">Admin - {{ $title }}</x-slot>

    <nav class="bg-white border-b border-gray-200 fixed z-30 w-full">
        <div class="px-3 py-2 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <x-icons.application-logo class="h-8 h-8" />
                    </a>
                </div>
                <div class="flex items-center">
                    <div
                        class="flex cursor-pointer justify-center items-center w-10 h-10 hover:bg-indigo-100 hover:text-indigo-500 hover:rounded-xl ml-3">

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                           this.closest('form').submit();">
                                <x-icons.icon-logout class="h-5 w-5" />
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex overflow-hidden bg-white pt-16">
        @include('admin.layouts.sidebar')
        <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>

        <main class="dashboard-body">
            {{ $slot }}
        </main>
    </div>
</x-base-layout>

