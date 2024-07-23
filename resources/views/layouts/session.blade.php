@if (session('success'))
    <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-md mb-6">
        {{ session('success') }}
    </div>
@endif
