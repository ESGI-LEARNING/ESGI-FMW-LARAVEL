<nav class="bg-white border-b border-gray-200 fixed z-30 w-full">
    <div class="w-full mx-auto">
        <div class="flex items-center justify-between h-16">

            <!-- Logo -->
            <div class="flex gap-2 items-center pl-2">
                <a href="{{ route('admin.index') }}" class="flex items-center">
                    <x-icons.application-logo/>
                </a>
            </div>


            <form method="POST" action="{{ route('logout') }}"
                  class="inline-flex items-center pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                @csrf

                <a href="{{  route('logout') }}"
                   onclick="event.preventDefault();
                    this.closest('form').submit();">
                    <x-icons.icon-logout class="h-5 w-5"/>
                </a>
            </form>
        </div>
    </div>
</nav>
