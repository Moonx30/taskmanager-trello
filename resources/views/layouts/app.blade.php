<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased relative min-h-screen">

    {{-- Background image --}}
    <div class="absolute inset-0 bg-cover bg-center z-0" style="background-image: url('/path-to-your-image.jpg');"></div>

    {{-- Dark overlay --}}
    <div class="absolute inset-0 bg-black bg-opacity-70 z-10"></div>

    {{-- Main app content --}}
    <div class="relative z-20 min-h-screen">
        @livewire('layout.navigation')

        <main class="py-6 px-4">
            @hasSection('content')
                @yield('content')
            @else
                {{ $slot ?? '' }}
            @endif
        </main>
    </div>

    @livewire('wire-elements-modal')
</body>
</html>
