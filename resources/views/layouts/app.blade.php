<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
{{-- <html lang="en"> --}}
<html lang="en" x-data="{ darkMode: localStorage.getItem('dark-mode') === 'true' }" x-bind:class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    @include('partials.header')
    @include('partials.sidebar')

    <!-- Page Heading -->
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            @isset($header)
                {{ $header }}
            @endisset
        </div>
    </div>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>


    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>
</body>

</html>
