<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold text-gray-800 dark:text-white">Create New Bank</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <form action="{{ route('banks.store') }}" method="POST">
                        @csrf

                        <!-- Bank Name Input -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 dark:text-gray-300">Bank Name:</label>
                            <input type="text" name="name" id="name" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-500 transition duration-200">
                            Create Bank
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
