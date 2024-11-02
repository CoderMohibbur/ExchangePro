<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Edit Bank</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <form action="{{ route('banks.update', $bank->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Bank Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 dark:text-gray-300">Bank Name:</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $bank->name) }}" required
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- Bank Balance (Optional) -->
                        <div class="mb-4">
                            <label for="balance" class="block text-gray-700 dark:text-gray-300">Initial Balance (BDT):</label>
                            <input type="number" name="balance" id="balance" value="{{ old('balance', $bank->balances->sum('amount')) }}" step="0.01"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" disabled>
                            <small class="text-gray-500 dark:text-gray-400">The initial balance is for display only. To adjust, please use the bank balance management options.</small>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-500 transition duration-200">
                            Update Bank
                        </button>

                        <a href="{{ route('banks.index') }}" class="px-4 py-2 ml-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-700 transition duration-200">
                            Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
