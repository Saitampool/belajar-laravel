<!DOCTYPE html>
<html lang="en" class="bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @isset($title)
            {{ $title }} / Laravel
        @else
            Laravel
        @endisset
    </title>
    @vite('resources/css/app.css')
</head>

<body class="h-full">
    <div class="min-h-full">
        <x-navbar.index />
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <x-navbar.dropdown-item href="/">Home</x-navbar.dropdown-item>
            <x-navbar.dropdown-item href="/about">About</x-navbar.dropdown-item>
            <x-navbar.dropdown-item href="/contact">Contact</x-navbar.dropdown-item>
            <x-navbar.dropdown-item href="/gallery">Gallery</x-navbar.dropdown-item>
            <x-navbar.dropdown-item href="/users">Users</x-navbar.dropdown-item>
        </div>
    </div>
    </nav>

    @isset($heading)
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
            </div>
        </header>
    @endisset
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>
    </div>
</body>

</html>
