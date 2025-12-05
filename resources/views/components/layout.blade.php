<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name', 'Madrasah') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    @stack('styles')
</head>
<body class="bg-gray-100 text-gray-800 font-sans antialiased">
    <x-navbar />

    <main class="min-h-screen">
        {{ $slot }}
    </main>

    <x-footer />
</body>
</html>