<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Add New Currency</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <form action="{{ route('currencies.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300">Name</label>
                            <input type="text" name="name" class="w-full mt-1 border rounded p-2 dark:bg-gray-700 dark:text-gray-300">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300">Code</label>
                            <input type="text" name="code" class="w-full mt-1 border rounded p-2 dark:bg-gray-700 dark:text-gray-300">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300">Exchange Rate</label>
                            <input type="number" name="exchange_rate" step="0.0001" class="w-full mt-1 border rounded p-2 dark:bg-gray-700 dark:text-gray-300">
                        </div>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">Save Currency</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
