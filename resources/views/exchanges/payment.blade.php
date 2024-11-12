<x-app-layout>
    <x-slot name="title">
        Complete Partial Payment
    </x-slot>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Complete Payment for Exchange #{{ $exchange->id }}</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <form action="{{ route('exchanges.completePartialPayment', $exchange->id) }}" method="POST">
                        @csrf
                        <!-- Display Current Payment Status -->
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-white ">Total Amount:</label>
                            <span class="text-gray-700 dark:text-gray-300 font-semibold">{{ number_format($exchange->total_amount, 2) }} BDT</span>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300">Paid Amount:</label>
                            <span class="text-gray-700 dark:text-gray-300 font-semibold">{{ number_format($exchange->paid_to_seller_bdt, 2) }} BDT</span>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300">Remaining Due:</label>
                            <span class="text-gray-700 dark:text-gray-300 font-semibold">{{ number_format($exchange->due_amount, 2) }} BDT</span>
                        </div>

                        <!-- Additional Payment Input -->
                        <div class="mb-4">
                            <label for="additional_payment" class="block text-gray-700 dark:text-gray-300">Enter Additional Payment:</label>
                            <input type="number" name="additional_payment" id="additional_payment" step="0.01" max="{{ $exchange->due_amount }}" class="form-control mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" required>
                            @error('additional_payment')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-500 transition duration-200">
                            Complete Payment
                        </button>
                        <a href="{{ route('exchanges.index') }}" 
                        class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-500 transition duration-200">
                            All Exchanges
                        </a>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
