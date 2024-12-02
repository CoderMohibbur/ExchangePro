<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.getItem('dark-mode') === 'true' }" x-bind:class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Dashboard' }}</title>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="dark:bg-gray-900 font-sans antialiased">
    @include('layouts.header')
    @include('layouts.sidebar')

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

    <!-- Dropdown Active State Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdowns = document.querySelectorAll('[data-collapse-toggle]');

            dropdowns.forEach((dropdown) => {
                const dropdownId = dropdown.getAttribute('data-collapse-toggle');
                const submenu = document.getElementById(dropdownId);
                const activeSubmenuItem = submenu?.querySelector('.active');

                if (activeSubmenuItem) {
                    dropdown.setAttribute('aria-expanded', 'true');
                    submenu.classList.remove('hidden');
                }
            });
        });
    </script>
</body>

</html>
