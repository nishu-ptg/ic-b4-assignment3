<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') | Interactive Cares</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @include('layouts.main.partials._head-custom-scripts')
    @include('layouts.main.partials._head-custom-styles')
    @stack('styles')
</head>

<body class="bg-gray-50 min-h-screen">
    <div class="flex flex-col lg:flex-row min-h-screen">
        @include('layouts.main.partials._sidebar')
        <main class="flex-1 flex flex-col">
            @hasSection('page_title')
                @include('layouts.main.partials._header')
            @endif

            @include('layouts.main.partials._flash')

            @yield('content')
        </main>
    </div>
    @include('layouts.main.partials._custom-end-script')
    @stack('scripts')
</body>
</html>
