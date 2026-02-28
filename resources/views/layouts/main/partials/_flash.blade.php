@if(session('success'))
    <div class="mt-4 mx-6 lg:mx-8 p-4 rounded-lg bg-green-100 text-green-800 shadow">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="mt-4 mx-6 lg:mx-8 p-4 rounded-lg bg-red-100 text-red-800 shadow">
        {{ session('error') }}
    </div>
@endif
