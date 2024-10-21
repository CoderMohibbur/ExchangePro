<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Panel' }}</title>
    <!-- TailAdmin CSS -->
    <link rel="stylesheet" href="{{ asset('css/tailadmin.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <!-- Include TailAdmin Header and Sidebar -->
        @include('partials.header')
        @include('partials.sidebar')

        <!-- Main Content Area -->
        <div class="content">
            <!-- Header Slot -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Main Slot -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- TailAdmin JS -->
    <script src="{{ asset('js/tailadmin.js') }}"></script>
</body>
</html>
