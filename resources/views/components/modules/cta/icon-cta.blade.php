<a {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center p-2 bg-transparent border border-transparent rounded-md tracking-widest hover:bg-gray-300 focus:bg-gray-100 active:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
